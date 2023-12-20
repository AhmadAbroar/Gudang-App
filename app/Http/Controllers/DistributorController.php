<?php

namespace App\Http\Controllers;

use App\Models\Distributor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DistributorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $distributors = Distributor::all();
        return view('distributors.index', compact('distributors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('distributors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_distributor' => 'required|string|max:255',
            'alamat_distributor' => 'required|string',
            'telp_distributor' => 'required|string|max:20',
        ]);

        if ($validator->fails()) {
            return redirect('distributors/create')
                        ->withErrors($validator)
                        ->withInput();
        }

        Distributor::create($request->all());
        return redirect()->route('distributors.index');
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
    public function edit(Distributor $distributor)
    {
        return view('distributors.edit', compact('distributor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Distributor $distributor)
    {
        $validator = Validator::make($request->all(), [
            'nama_distributor' => 'required|string|max:255',
            'alamat_distributor' => 'required|string',
            'telp_distributor' => 'required|string|max:20',
        ]);

        if ($validator->fails()) {
            return redirect('distributors/'.$distributor->id.'/edit')
                        ->withErrors($validator)
                        ->withInput();
        }

        $distributor->update($request->all());
        return redirect()->route('distributors.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Distributor $distributor)
    {
        $distributor->delete();
        return redirect()->route('distributors.index');
    }
}
