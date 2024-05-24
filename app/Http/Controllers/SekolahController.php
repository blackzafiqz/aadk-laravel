<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sekolah;
class SekolahController extends Controller
{
    public function index()
    {
        $sekolah = Sekolah::all();
        return view('sekolah.index', compact('sekolah'));
    }
    public function create()
    {
        return view('sekolah.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'kod_sekolah' => 'required',
            'nama_sekolah' => 'required',
            'alamat' => 'required',
            'poskod' => 'required',
            'bandar' => 'required',
            'negeri' => 'required',
        ]);
        Sekolah::create($request->all());
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
            'kod_sekolah' => 'required',
            'nama_sekolah' => 'required',
            'alamat' => 'required',
            'poskod' => 'required',
            'bandar' => 'required',
            'negeri' => 'required',
        ]);
        $sekolah->update($request->all());
        return redirect()->route('sekolah.index')
            ->with('success', 'Sekolah updated successfully');
    }
}
