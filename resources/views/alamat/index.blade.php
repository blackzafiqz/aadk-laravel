@extends('layouts.app2')
@section('content')
    <div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Data Alamat</div>
                    <div class="card-body">
                        <a href="{{ route('alamat.create') }}" class="btn btn-primary">Tambah Alamat</a>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Negeri</th>
                                    <th>Daerah</th>
                                    <th>Mukim</th>
                                    <th>Poskod</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($alamat as $alamat)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $alamat->negeri }}</td>
                                        <td>{{ $alamat->daerah }}</td>
                                        <td>{{ $alamat->mukim }}</td>
                                        <td>{{ $alamat->poskod }}</td>
                                        <td>
                                            <a href="{{ route('alamat.edit', $alamat->id) }}" class="btn btn-warning">Edit</a>
                                            <form action="{{ route('alamat.destroy', $alamat->id) }}" method="post"
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
