<?php

namespace App\Http\Controllers;

use App\Models\BarangKeluar;
use App\Models\User;
use App\Models\Barang;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Illuminate\Support\Facades\Date;

class BarangKeluarController extends Controller
{
    public function index()
    {
        $barangKeluars = BarangKeluar::with(['user', 'barang'])->latest()->paginate(10);
        return view('barang_keluar.index', compact('barangKeluars'));
    }

    public function create()
    {
        $users = User::all();
        $barangs = Barang::all();
        return view('barang_keluar.create', compact('users', 'barangs'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'id_user' => 'required|exists:users,id',
            'id_barang' => 'required|exists:barangs,id',
            'jumlah' => 'required|integer|min:1',
            'tanggal' => 'required|date',
        ]);

        if ($validator->fails()) {
            return redirect('barang-keluar/create')
                ->withErrors($validator)
                ->withInput();
        }

        // Check if there is sufficient stock
        $barang = Barang::find($request->id_barang);

        // Check if the quantity is valid (not going below 0)
        if ($barang->stok < $request->jumlah) {
            return redirect('barang-keluar/create')
                ->with('error', 'Insufficient stock for the selected item.')
                ->withInput();
        }

        // Create a new record for outgoing items
        $barangKeluar = BarangKeluar::create($request->all());

        // Update the stock in the related Barang
        $barang->stok -= $request->jumlah;
        $barang->save();

        return redirect()->route('barang-keluar.index')->with('success', 'recorded successfully.');
    }

    public function generateReport()
    {
        $barangKeluars = BarangKeluar::with(['user', 'barang'])->latest()->get();

        $timestamp = Date::now()->format('Ymd_His');

        $pdfFileName = 'barang_masuk_report_' . $timestamp . '.pdf';

        $pdf = FacadePdf::loadView('barang_keluar.report', compact('barangKeluars'));

        return $pdf->download($pdfFileName);
    }
}
