@extends('layouts.app2')

@section('content')
    <div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Data Sekolah</div>
                    <div class="card-body">
                        <a href="{{ route('sekolah.create') }}" class="btn btn-primary">Tambah Sekolah</a>

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Sekolah</th>
                                    <th>Alamat</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sekolah as $sekolah)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $sekolah->nama_sekolah }}</td>
                                        <td>{{ $sekolah->alamat->negeri }}</td>
                                        <td>
                                            <a href="{{ route('sekolah.edit', $sekolah->id) }}"
                                                class="btn btn-warning">Edit</a>
                                            <form action="{{ route('sekolah.destroy', $sekolah->id) }}" method="post"
                                                class="d-inline">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
