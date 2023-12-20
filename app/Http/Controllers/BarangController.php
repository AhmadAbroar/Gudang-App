<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Merek;
use App\Models\Type;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barangs = Barang::with('merek', 'type')->get();
        return view('barangs.index', compact('barangs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $mereks = Merek::all();
        $types = Type::all();
        return view('barangs.create', compact('mereks', 'types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_merek' => 'required|exists:mereks,id',
            'id_type' => 'required|exists:types,id',
            'nama_barang' => 'required|string|max:255',
            'stok' => 'required|integer|min:0',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        if ($validator->fails()) {
            return redirect('barangs/create')
                        ->withErrors($validator)
                        ->withInput();
        }
    
        $fotoPath = null;
    
        if ($request->hasFile('foto')) {
            $originalName = $request->file('foto')->getClientOriginalName();
            $fileName = pathinfo($originalName, PATHINFO_FILENAME);
            $extension = $request->file('foto')->getClientOriginalExtension();
            $fotoName = $fileName.'_'.time().'.'.$extension;
    
            $fotoPath = $request->file('foto')->storeAs('barang_fotos', $fotoName, 'public');
        }
    
        $barangData = $request->except('foto');
        $barangData['foto'] = $fotoPath;
    
        Barang::create($barangData);
        return redirect()->route('barangs.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Barang $barang)
    {
        $mereks = Merek::all();
        $types = Type::all();
        return view('barangs.edit', compact('barang', 'mereks', 'types'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Barang $barang)
    {
        $validator = Validator::make($request->all(), [
            'id_merek' => 'required|exists:mereks,id',
            'id_type' => 'required|exists:types,id',
            'nama_barang' => 'required|string|max:255',
            'stok' => 'required|integer|min:0',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        if ($validator->fails()) {
            return redirect('barangs/'.$barang->id.'/edit')
                        ->withErrors($validator)
                        ->withInput();
        }
    
        $fotoPath = $barang->foto;
    
        if ($request->hasFile('foto')) {
            // Delete the existing photo if it exists
            if ($fotoPath) {
                Storage::disk('public')->delete($fotoPath);
            }
    
            $originalName = $request->file('foto')->getClientOriginalName();
            $fileName = pathinfo($originalName, PATHINFO_FILENAME);
            $extension = $request->file('foto')->getClientOriginalExtension();
            $fotoName = $fileName.'_'.time().'.'.$extension;
    
            $fotoPath = $request->file('foto')->storeAs('barang_fotos', $fotoName, 'public');
        }
    
        $barangData = $request->except('foto');
        $barangData['foto'] = $fotoPath;
    
        $barang->update($barangData);
        return redirect()->route('barangs.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Barang $barang)
    {
        $barang->delete();
        return redirect()->route('barangs.index');
    }

}
