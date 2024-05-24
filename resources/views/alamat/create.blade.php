@extends('layouts.app2')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Tambah Alamat</h2>
                <form action="{{ route('alamat.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="negeri">Negeri:</label>
                        <input type="text" name="negeri" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="daerah">Daerah:</label>
                        <input type="text" name="daerah" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="mukim">Mukim:</label>
                        <input type="text" name="mukim" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="poskod">Poskod:</label>
                        <input type="text" name="poskod" class="form-control" required>
                    </div>
                    <div class="pt-3">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
