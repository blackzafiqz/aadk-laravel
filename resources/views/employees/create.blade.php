@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Create Employee</h2>
                <form action="{{ route('employees.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="form-group ">
                        <label for="email">Email:</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone:</label>
                        <input type="text" name="phone" class="form-control" required>
                    </div>
                    <div class="pt-3">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <div>
                </form>
            </div>
        </div>
    </div>
@endsection
