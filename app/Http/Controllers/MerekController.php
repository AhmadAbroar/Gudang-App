<?php

namespace App\Http\Controllers;

use App\Models\Merek;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MerekController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mereks = Merek::all();
        return view('mereks.index', compact('mereks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('mereks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_merek' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect('mereks/create')
                        ->withErrors($validator)
                        ->withInput();
        }

        Merek::create($request->all());
        return redirect()->route('mereks.index');
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
    public function edit(Merek $merek)
    {
        return view('mereks.edit', compact('merek'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Merek $merek)
    {
        $validator = Validator::make($request->all(), [
            'nama_merek' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect('mereks/'.$merek->id.'/edit')
                        ->withErrors($validator)
                        ->withInput();
        }

        $merek->update($request->all());
        return redirect()->route('mereks.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Merek $merek)
    {
        $merek->delete();
        return redirect()->route('mereks.index');
    }
}
