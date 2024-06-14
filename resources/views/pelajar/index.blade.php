@extends('layouts.app2')
@section('content')
    <div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Data Pelajar</div>
                    <div class="card-body">
                        <a href="{{ route('pelajar.create') }}" class="btn btn-primary">Tambah Pelajar</a>

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Pelajar</th>
                                    <th>Kad Pengenalan</th>
                                    <th>Alamat</th>
                                    <th>Nama Sekolah</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pelajars as $pelajar)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $pelajar->nama }}</td>
                                        <td>{{ $pelajar->no_mykad }}</td>
                                        <td>{{ $pelajar->address_line }}</td>
                                        <td>{{ $pelajar->sekolah->nama }}</td>
                                        <td>

                                            <a href="{{ route('pelajar.edit', $pelajar->no_mykad) }}"
                                                class="btn btn-warning">Edit</a>
                                            <form action="{{ route('pelajar.destroy', $pelajar->no_mykad) }}" method="post"
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
