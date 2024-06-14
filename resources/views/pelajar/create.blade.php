@extends('layouts.app2')
@section('content')
    <h2>Tambah Pelajar</h2>
    <form action="{{ route('pelajar.store') }}" method="POST">
        <div class="row">

            @csrf
            <div class="col">
                <h3>Maklumat Pelajar</h3>
                <div class="form-group">
                    <label for="nama">Nama Pelajar:</label>
                    <input type="text" id="nama" name="nama" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="no_mykad">Kad Pengenalan:</label>
                    <input type="text" id="no_mykad" name="no_mykad" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="address_line">Alamat:</label>
                    <input type="text" id="address_line" name="address_line" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="negeri_pelajar">Negeri:</label>
                    <select id="negeri_pelajar" name="negeri_pelajar" class="form-control" required>
                        <option selected value="">Pilih Negeri</option>
                        @foreach ($alamats->unique('negeri') as $negeri)
                            <option value="{{ $negeri->negeri }}">{{ $negeri->negeri }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="daerah_pelajar">Daerah:</label>
                    <select disabled id="daerah_pelajar" name="daerah_pelajar" class="form-control" required>

                    </select>
                </div>

                <div class="form-group">
                    <label for="mukim_pelajar">Mukim:</label>
                    <select disabled id="mukim_pelajar" name="mukim_pelajar" class="form-control" required>

                    </select>
                </div>
                <div class="form-group">
                    <label for="poskod_pelajar">Poskod:</label>
                    <select disabled id="poskod_pelajar" name="poskod_pelajar" class="form-control" required>

                    </select>
                </div>
            </div>
            <div class="col">
                <h3>Maklumat Sekolah</h3>
                <div class="form-group">
                    <label for="negeri_sekolah">Negeri:</label>
                    <select id="negeri_sekolah" name="negeri_sekolah" class="form-control" required>
                        <option selected value="">Pilih Negeri</option>
                        @foreach ($alamats->unique('negeri') as $negeri)
                            <option value="{{ $negeri->negeri }}">{{ $negeri->negeri }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="daerah_sekolah">Daerah:</label>
                    <select disabled id="daerah_sekolah" name="daerah_sekolah" class="form-control" required>

                    </select>
                </div>

                <div class="form-group">
                    <label for="mukim_sekolah">Mukim:</label>
                    <select disabled id="mukim_sekolah" name="mukim_sekolah" class="form-control" required>

                    </select>
                </div>
                <div class="form-group">
                    <label for="poskod_sekolah">Poskod:</label>
                    <select disabled id="poskod_sekolah" name="poskod_sekolah" class="form-control" required>

                    </select>
                </div>

                <div class="form-group">
                    <label for="sekolah_id">Sekolah:</label>
                    <select id="sekolah_id" name="sekolah_id" class="form-control" disabled required>
                    </select>
                </div>
            </div>

        </div>
    </form>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $('select[name="negeri_pelajar"]').on('change', function() {
                var negeri = $(this).val();
                if (negeri) {
                    $.ajax({
                        url: "/admin/alamat/daerah/" + negeri,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('select[name="daerah_pelajar"]').empty();
                            $('select[name="daerah_pelajar"]').append(
                                '<option value="">Pilih Daerah</option>');
                            $.each(data, function(key, value) {
                                $('select[name="daerah_pelajar"]').append(
                                    '<option value="' + value.daerah + '">' + value
                                    .daerah + '</option>');
                            });
                            $('select[name="daerah_pelajar"]').prop('disabled', false);
                        }
                    });
                } else {
                    $('select[name="daerah_pelajar"]').empty();
                }
            });

            $('select[name="daerah_pelajar"]').on('change', function() {
                var daerah = $(this).val();
                if (daerah) {
                    $.ajax({
                        url: "/admin/alamat/mukim/" + daerah,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('select[name="mukim_pelajar"]').empty();
                            $('select[name="mukim_pelajar"]').append(
                                '<option value="">Pilih Mukim</option>');
                            $.each(data, function(key, value) {
                                $('select[name="mukim_pelajar"]').append(
                                    '<option value="' + value.mukim + '">' + value
                                    .mukim + '</option>');
                            });
                            $('select[name="mukim_pelajar"]').prop('disabled', false);
                        }
                    });
                } else {
                    $('select[name="mukim_pelajar"]').empty();
                }
            });


            $('select[name="mukim_pelajar"]').on('change', function() {
                var mukim = $(this).val();
                var daerah = $('select[name="daerah_pelajar"]').val();
                var negeri = $('select[name="negeri_pelajar"]').val();

                if (mukim) {
                    $.ajax({
                        url: "/admin/alamat/poskod/",
                        type: "GET",
                        dataType: "json",
                        data: {
                            daerah: daerah,
                            negeri: negeri,
                            mukim: mukim
                        },
                        success: function(data) {
                            $('select[name="poskod_pelajar"]').empty();
                            $('select[name="poskod_pelajar"]').append(
                                '<option value="">Pilih Poskod</option>');
                            $.each(data, function(key, value) {
                                $('select[name="poskod_pelajar"]').append(
                                    '<option value="' + value.poskod + '">' + value
                                    .poskod + '</option>');
                            });
                            $('select[name="poskod_pelajar"]').prop('disabled', false);
                        }
                    });
                } else {
                    $('select[name="poskod_pelajar"]').empty();
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('select[name="negeri_sekolah"]').on('change', function() {
                var negeri = $(this).val();
                if (negeri) {
                    $.ajax({
                        url: "/admin/alamat/daerah/" + negeri,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('select[name="daerah_sekolah"]').empty();
                            $('select[name="daerah_sekolah"]').append(
                                '<option value="">Pilih Daerah</option>');
                            $.each(data, function(key, value) {
                                $('select[name="daerah_sekolah"]').append(
                                    '<option value="' + value.daerah + '">' + value
                                    .daerah + '</option>');
                            });
                            $('select[name="daerah_sekolah"]').prop('disabled', false);
                        }
                    });
                } else {
                    $('select[name="daerah_sekolah"]').empty();
                }
            });

            $('select[name="daerah_sekolah"]').on('change', function() {
                var daerah = $(this).val();
                if (daerah) {
                    $.ajax({
                        url: "/admin/alamat/mukim/" + daerah,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('select[name="mukim_sekolah"]').empty();
                            $('select[name="mukim_sekolah"]').append(
                                '<option value="">Pilih Mukim</option>');
                            $.each(data, function(key, value) {
                                $('select[name="mukim_sekolah"]').append(
                                    '<option value="' + value.mukim + '">' + value
                                    .mukim + '</option>');
                            });
                            $('select[name="mukim_sekolah"]').prop('disabled', false);
                        }
                    });
                } else {
                    $('select[name="mukim_sekolah"]').empty();
                }
            });


            $('select[name="mukim_sekolah"]').on('change', function() {
                var mukim = $(this).val();
                var daerah = $('select[name="daerah_sekolah"]').val();
                var negeri = $('select[name="negeri_sekolah"]').val();

                if (mukim) {
                    $.ajax({
                        url: "/admin/alamat/poskod/",
                        type: "GET",
                        dataType: "json",
                        data: {
                            daerah: daerah,
                            negeri: negeri,
                            mukim: mukim
                        },
                        success: function(data) {
                            $('select[name="poskod_sekolah"]').empty();
                            $('select[name="poskod_sekolah"]').append(
                                '<option value="">Pilih Poskod</option>');
                            $.each(data, function(key, value) {
                                $('select[name="poskod_sekolah"]').append(
                                    '<option value="' + value.poskod + '">' + value
                                    .poskod + '</option>');
                            });
                            $('select[name="poskod_sekolah"]').prop('disabled', false);
                        }
                    });
                } else {
                    $('select[name="poskod_sekolah"]').empty();
                }
            });
            $('select[name="poskod_sekolah"]').on('change', function() {
                var daerah = $(this).val();
                if (daerah) {
                    $.ajax({
                        url: "/admin/sekolah/findByPostcode/" + daerah,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('select[name="sekolah_id"]').empty();
                            $('select[name="sekolah_id"]').append(
                                '<option value="">Pilih Sekolah</option>');
                            $.each(data, function(key, value) {
                                $('select[name="sekolah_id"]').append(
                                    '<option value="' + value.kod_sekolah + '">' +
                                    value
                                    .nama + '</option>');
                            });
                            $('select[name="sekolah_id"]').prop('disabled', false);
                        }
                    });
                } else {
                    $('select[name="sekolah_id"]').empty();
                }
            });
        });
    </script>
@endsection
