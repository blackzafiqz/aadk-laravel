@extends('layouts.app2')
@section('content')
    <div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Edit Pelajar</div>
                    <div class="card-body">
                        <form action="{{ route('pelajar.update', $pelajar->no_mykad) }}" method="post">
                            @csrf
                            @method('put')
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama Pelajar</label>
                                <input type="text" class="form-control" id="nama" name="nama"
                                    value="{{ $pelajar->nama }}">
                            </div>
                            <div class="mb-3">
                                <label for="no_mykad" class="form-label">Kad Pengenalan</label>
                                <input type="text" class="form-control" id="no_mykad" name="no_mykad"
                                    value="{{ $pelajar->no_mykad }}">
                            </div>
                            <div class="mb-3">
                                <label for="address_line" class="form-label">Alamat</label>
                                <input type="text" class="form-control" id="address_line" name="address_line"
                                    value="{{ $pelajar->address_line }}">
                            </div>
                            <div class="mb-3">
                                <label for="kod_sekolah" class="form-label">Sekolah</label>
                                <select class="form-select" id="kod_sekolah" name="kod_sekolah">
                                    @foreach ($sekolahs as $sekolah)
                                        <option value="{{ $sekolah->kod_sekolah }}"
                                            {{ $pelajar->kod_sekolah == $sekolah->kod_sekolah ? 'selected' : '' }}>
                                            {{ $sekolah->nama }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
