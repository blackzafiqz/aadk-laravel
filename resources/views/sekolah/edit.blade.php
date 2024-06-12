@extends('layouts.app2')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Edit Sekolah</h2>
                <form action="{{ route('sekolah.update', $sekolah->kod_sekolah) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="kod_sekolah">Kod Sekolah:</label>
                        <input readonly disabled type="text" id="kod_sekolah" name="kod_sekolah" class="form-control"
                            value="{{ $sekolah->kod_sekolah }}" required>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama Sekolah:</label>
                        <input type="text" id="nama" name="nama" class="form-control"
                            value="{{ $sekolah->nama }}" required>
                    </div>
                    <div class="form-group">
                        <label for="address_line">Alamat:</label>
                        <input type="text" id="address_line" name="address_line" class="form-control"
                            value="{{ $sekolah->address_line }}" required>
                    </div>
                    <div class="pt-3">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <div>
                </form>
            </div>
        </div>
    </div>
@endsection
