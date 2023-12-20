<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Type;
use App\Models\Merek;
use Illuminate\Support\Facades\Validator;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $types = Type::with('merek')->get();
        return view('types.index', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $mereks = Merek::all();
        return view('types.create', compact('mereks'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_merek' => 'required|exists:mereks,id',
            'nama_type' => 'required|string|max:255',
            'tahun_rilis' => 'required|integer|min:1900',
        ]);

        if ($validator->fails()) {
            return redirect('types/create')
                        ->withErrors($validator)
                        ->withInput();
        }

        Type::create($request->all());
        return redirect()->route('types.index');
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
    public function edit(Type $type)
    {
        $mereks = Merek::all();
        return view('types.edit', compact('type', 'mereks'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Type $type)
    {
        $validator = Validator::make($request->all(), [
            'id_merek' => 'required|exists:mereks,id',
            'nama_type' => 'required|string|max:255',
            'tahun_rilis' => 'required|integer|min:1900',
        ]);

        if ($validator->fails()) {
            return redirect('types/'.$type->id.'/edit')
                        ->withErrors($validator)
                        ->withInput();
        }

        $type->update($request->all());
        return redirect()->route('types.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Type $type)
    {
        $type->delete();
        return redirect()->route('types.index');
    }
}
