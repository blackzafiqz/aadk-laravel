@extends('layouts.app2')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Tambah Sekolah</h2>
                <form action="{{ route('sekolah.store') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="nama">Nama Sekolah:</label>
                        <input type="text" id="nama" name="nama" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="negeri">Negeri:</label>
                        <select id="negeri" name="negeri" class="form-control" required>
                            <option selected value="">Pilih Negeri</option>
                            @foreach ($alamats->unique('negeri') as $negeri)
                                <option value="{{ $negeri->negeri }}">{{ $negeri->negeri }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="daerah">Daerah:</label>
                        <select disabled id="daerah" name="daerah" class="form-control" required>

                        </select>
                    </div>

                    <div class="form-group">
                        <label for="mukim">Mukim:</label>
                        <select disabled id="mukim" name="mukim" class="form-control" required>

                        </select>
                    </div>

                    <div class="pt-3">
                        <button disabled type="submit" class="btn btn-primary">Submit</button>
                        <div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $('select[name="negeri"]').on('change', function() {
                var negeri = $(this).val();
                if (negeri) {
                    $.ajax({
                        url: "/admin/alamat/daerah/" + negeri,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('select[name="daerah"]').empty();
                            $('select[name="daerah"]').append(
                                '<option value="">Pilih Daerah</option>');
                            $.each(data, function(key, value) {
                                $('select[name="daerah"]').append(
                                    '<option value="' + value.daerah + '">' + value
                                    .daerah + '</option>');
                            });
                            $('select[name="daerah"]').prop('disabled', false);
                        }
                    });
                } else {
                    $('select[name="daerah"]').empty();
                }
            });

            $('select[name="daerah"]').on('change', function() {
                var daerah = $(this).val();
                if (daerah) {
                    $.ajax({
                        url: "/admin/alamat/mukim/" + daerah,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('select[name="mukim"]').empty();
                            $('select[name="mukim"]').append(
                                '<option value="">Pilih Mukim</option>');
                            $.each(data, function(key, value) {
                                $('select[name="mukim"]').append(
                                    '<option value="' + value.mukim + '">' + value
                                    .mukim + '</option>');
                            });
                            $('select[name="mukim"]').prop('disabled', false);
                        }
                    });
                } else {
                    $('select[name="mukim"]').empty();
                }
            });

            $('select[name="mukim"]').on('change', function() {
                var mukim = $(this).val();
                if (mukim) {
                    $('button[type="submit"]').prop('disabled', false);
                } else {
                    $('button[type="submit"]').prop('disabled', true);
                }
            });
        });
    </script>
@endsection
