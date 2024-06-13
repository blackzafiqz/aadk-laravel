<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sekolah;
use App\Models\Alamat;

class SekolahController extends Controller
{
    public function index()
    {
        $sekolahs = Sekolah::all();
        return view('sekolah.index', compact('sekolahs'));
    }
    public function create()
    {
        $alamats = Alamat::all();
        return view('sekolah.create', compact('alamats'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'kod_sekolah' => 'required',
            'nama_sekolah' => 'required',
            'address_line' => 'required',
            'poskod' => 'required',
        ]);
        $alamat = Alamat::where('poskod', $request->poskod)->first();

        Sekolah::create([
            'kod_sekolah' => $request->kod_sekolah,
            'nama' => $request->nama_sekolah,
            'address_line' => $request->address_line,
            'alamat_id' => $alamat->id,
        ]);
        return redirect()->route('sekolah.index')
            ->with('success', 'Sekolah created successfully.');
    }
    public function show(Sekolah $sekolah)
    {
        return view('sekolah.show', compact('sekolah'));
    }
    public function edit(Sekolah $sekolah)
    {
        return view('sekolah.edit', compact('sekolah'));
    }
    public function update(Request $request, Sekolah $sekolah)
    {
        $request->validate([
            'nama' => 'required',
            'address_line' => 'required',
        ]);
        $sekolah->update($request->all());
        return redirect()->route('sekolah.index')
            ->with('success', 'Sekolah updated successfully');
    }
    public function destroy(Sekolah $sekolah)
    {
        $sekolah->delete();
        return redirect()->route('sekolah.index')
            ->with('success', 'Sekolah deleted successfully');
    }
}
