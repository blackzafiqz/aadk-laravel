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
            'negeri_pelajar' => 'required',
            'daerah_pelajar' => 'required',
            'mukim_pelajar' => 'required',
            'poskod_pelajar' => 'required',
            'kod_sekolah' => 'required',
        ]);
        $alamat = Alamat::where('negeri', $request->negeri_pelajar)
            ->where('daerah', $request->daerah_pelajar)
            ->where('mukim', $request->mukim_pelajar)
            ->where('poskod', $request->poskod_pelajar)
            ->first();
        $res = Pelajar::create([
            'no_mykad' => $request->no_mykad,
            'nama' => $request->nama,
            'email' => $request->email,
            'address_line' => $request->address_line,
            'alamat_id' => $alamat->id,
            'kod_sekolah' => $request->kod_sekolah,
        ]);
        return redirect()->route('pelajar.index')
            ->with('success', 'Pelajar created successfully.');
    }
    public function show(Pelajar $pelajar)
    {
        return view('pelajar.show', compact('pelajar'));
    }
    public function edit(Pelajar $pelajar)
    {
        $sekolahs = Sekolah::all();
        return view('pelajar.edit', compact('pelajar', 'sekolahs'));
    }
    public function update(Request $request, Pelajar $pelajar)
    {
        $request->validate([
            'no_mykad' => 'requixred',
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
    public function destroy(Pelajar $pelajar)
    {
        $pelajar->delete();
        return redirect()->route('pelajar.index')
            ->with('success', 'Pelajar deleted successfully');
    }
}
