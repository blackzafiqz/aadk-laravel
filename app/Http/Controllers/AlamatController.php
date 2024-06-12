<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alamat;

use function Pest\Laravel\json;

class AlamatController extends Controller
{
    public function index()
    {
        $alamat = Alamat::all();
        return view('alamat.index', compact('alamat'));
    }

    public function create()
    {
        return view('alamat.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'daerah' => 'required',
            'poskod' => 'required',
            'mukim' => 'required',
            'negeri' => 'required',
        ]);

        Alamat::create($request->all());

        return redirect()->route('alamat.index')
            ->with('success', 'Alamat created successfully.');
    }

    public function show(Alamat $alamat)
    {
        return view('alamat.show', compact('alamat'));
    }

    public function edit(Alamat $alamat)
    {
        return view('alamat.edit', compact('alamat'));
    }

    public function update(Request $request, Alamat $alamat)
    {
        $request->validate([
            'daerah' => 'required',
            'poskod' => 'required',
            'mukim' => 'required',
            'negeri' => 'required',
        ]);

        $alamat->update($request->all());

        return redirect()->route('alamat.index')
            ->with('success', 'Alamat updated successfully');
    }

    public function destroy(Alamat $alamat)
    {
        $alamat->delete();

        return redirect()->route('alamat.index')
            ->with('success', 'Alamat deleted successfully');
    }

    public function negeri()
    {
        $negeri = Alamat::select('negeri')->distinct()->get();
        return response()->json($negeri);
    }
    public function daerah($negeri)
    {
        $daerah = Alamat::select('daerah')->where('negeri', $negeri)->distinct()->get();
        return response()->json($daerah);
    }
    public function mukim($daerah)
    {
        $mukim = Alamat::select('mukim')->where('daerah', $daerah)->distinct()->get();
        return response()->json($mukim);
    }
}
