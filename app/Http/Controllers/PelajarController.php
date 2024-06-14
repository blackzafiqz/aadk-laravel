<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelajar;
use App\Models\Sekolah;
use App\Models\Alamat;
class PelajarController extends Controller
{
    public function index()
    {
        $pelajars = Pelajar::all();
        return view('pelajar.index', compact('pelajars'));
    }
    public function create()
    {
        $sekolahs = Sekolah::all();
        $alamats = Alamat::all();
        return view('pelajar.create', compact('sekolahs', 'alamats'));
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
