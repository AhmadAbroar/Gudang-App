<?php

namespace App\Http\Controllers;

use App\Models\BarangMasuk;
use App\Models\User;
use App\Models\Distributor;
use App\Models\Barang;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Date;


class BarangMasukController extends Controller
{
    public function index()
    {
        $barangMasuks = BarangMasuk::with(['user', 'distributor', 'barang'])->latest()->paginate(10);
        return view('barang_masuk.index', compact('barangMasuks'));
    }

    public function create()
    {
        $users = User::all();
        $distributors = Distributor::all();
        $barangs = Barang::all();
        return view('barang_masuk.create', compact('users', 'distributors', 'barangs'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_user' => 'required|exists:users,id',
            'id_distributor' => 'required|exists:distributors,id_distributor',
            'id_barang' => 'required|exists:barangs,id',
            'jumlah' => 'required|integer|min:1',
            'tanggal' => 'required|date',
        ]);

        if ($validator->fails()) {
            return redirect('barang-masuk/create')
                ->withErrors($validator)
                ->withInput();
        }

        // Create a new record for incoming goods
        $barangMasuk = BarangMasuk::create($request->all());

        // Update the stock in the related Barang
        $barang = Barang::find($request->id_barang);
        $barang->stok += $request->jumlah;
        $barang->save();

        return redirect()->route('barang-masuk.index')->with('success', 'Incoming goods recorded successfully.');
    }

    public function generateReport()
    {
        $barangMasuks = BarangMasuk::with(['user', 'distributor', 'barang'])->latest()->get();

        $timestamp = Date::now()->format('Ymd_His');

        $pdfFileName = 'barang_masuk_report_' . $timestamp . '.pdf';

        $pdf = FacadePdf::loadView('barang_masuk.report', compact('barangMasuks'));

        return $pdf->download($pdfFileName);
    }
}
