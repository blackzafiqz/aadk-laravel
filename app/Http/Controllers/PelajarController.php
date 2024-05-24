<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelajar;
class PelajarController extends Controller
{
    public function index()
    {
        $pelajar = Pelajar::all();
        return view('pelajar.index', compact('pelajar'));
    }
    public function create()
    {
        return view('pelajar.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'no_mykad' => 'required',
            'nama' => 'required',
            'email' => 'required',
            'address_line' => 'required',
            'alamat_id' => 'required',
            'kod_sekolah' => 'required',
        ]);
        Pelajar::create($request->all());
        return redirect()->route('pelajar.index')
            ->with('success', 'Pelajar created successfully.');
    }
    public function show(Pelajar $pelajar)
    {
        return view('pelajar.show', compact('pelajar'));
    }
    public function edit(Pelajar $pelajar)
    {
        return view('pelajar.edit', compact('pelajar'));
    }
    public function update(Request $request, Pelajar $pelajar)
    {
        $request->validate([
            'no_mykad' => 'required',
            'nama' => 'required',
            'email' => 'required',
            'address_line' => 'required',
            'alamat_id' => 'required',
            'kod_sekolah' => 'required',
        ]);
        $pelajar->update($request->all());
        return redirect()->route('pelajar.index')
            ->with('success', 'Pelajar updated successfully');
    }
}
