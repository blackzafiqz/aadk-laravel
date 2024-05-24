@extends('layouts.app2')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Kemaskini Alamat</h2>
                <form action="{{ route('alamat.update', $alamat->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group
                    ">
                        <label for="negeri">Negeri:</label>
                        <input type="text" name="negeri" class="form-control" value="{{ $alamat->negeri }}" required>
                    </div>
                    <div class="form-group">
                        <label for="daerah">Daerah:</label>
                        <input type="text" name="daerah" class="form-control" value="{{ $alamat->daerah }}" required>
                    </div>
                    <div class="form-group">
                        <label for="mukim">Mukim:</label>
                        <input type="text" name="mukim" class="form-control" value="{{ $alamat->mukim }}" required>
                    </div>
                    <div class="form-group">
                        <label for="poskod">Poskod:</label>
                        <input type="text" name="poskod" class="form-control" value="{{ $alamat->poskod }}" required>
                    </div>
                    <div class="pt-3">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
