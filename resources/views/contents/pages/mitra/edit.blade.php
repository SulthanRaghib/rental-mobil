@extends('main')
@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h5 class="card-title">Edit Mitra</h5>

                    <button type="button" class="btn btn-sm btn-warning my-3" data-bs-toggle="modal"
                        data-bs-target="#staticBackdrop">
                        Kembali <i class="bi bi-arrow-left-circle"></i>
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="staticBackdrop"data-bs-backdrop="static" data-bs-keyboard="false"
                        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Anda yakin ingin kembali? data yang telah diinputkan tidak akan tersimpan dan akan
                                    hilang.
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <a href="{{ route('mitra.index') }}" class="btn btn-primary">Kembali</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <form action="{{ route('mitra.update', $mitra->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-4">
                                <div class="mb-3">
                                    <label for="nama">Nama Pemilik</label>
                                    <input type="text" name="nama" id="nama" class="form-control mb-3"
                                        placeholder="Masukkan Nama Pemilik" value="{{ $mitra->nama }}">
                                    @error('nama')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-4">
                                <div class="mb-3">
                                    <label for="nama_perusahaan">Nama Perusahaan</label>
                                    <input type="text" name="nama_perusahaan" id="nama_perusahaan"
                                        class="form-control mb-3" placeholder="Masukkan Nama Perusahaan"
                                        value="{{ $mitra->nama_perusahaan }}">
                                    @error('nama_perusahaan')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-4">
                                <div class="mb-3">
                                    <label for="no_telp">No Handphone</label>
                                    <input type="text" name="no_telp" id="no_telp" class="form-control mb-3"
                                        placeholder="Masukkan No Handphone" value="{{ $mitra->no_telp }}">
                                    @error('no_telp')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <label for="email">Email Mitra</label>
                                <input type="email" name="email" id="email" class="form-control mb-3"
                                    placeholder="Masukkan Email Mitra" value="{{ $mitra->email }}">
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-4">
                            <label for="alamat_rental">Alamat Rental</label>
                            <div class="row mt-2">
                                <div class="col-sm-4 mb-3">
                                    <label for="provinsi">Provinsi</label>
                                    <select name="" id="provinsi" class="form-select mb-0">
                                        <option value="" class="" disabled selected>Pilih Provinsi
                                        </option>
                                        @php
                                            // explode alamat : koma dan spasi
                                            $alamat = explode(', ', $mitra->alamat);
                                            $nama_provinsi = explode(' ', $alamat[0]);
                                        @endphp
                                        @foreach ($provinsi as $p)
                                            @if ($p['name'] == $nama_provinsi[1])
                                                <option value="{{ $p['id'] }}" selected>{{ $p['name'] }}
                                                </option>
                                            @else
                                                <option value="{{ $p['id'] }}">{{ $p['name'] }}</option>
                                            @endif
                                        @endforeach
                                        <input type="text" id="selected_provinsi" name="provinsi"
                                            value="{{ $nama_provinsi[1] }}">
                                    </select>
                                    @error('provinsi')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-sm-4 mb-3">
                                    <label for="kota">Kabupaten/Kota</label>
                                    <select name="" id="kota" class="form-select mb-0">
                                        <option value="" disabled selected>Pilih Provinsi Dahulu</option>
                                        <input type="text" id="selected_kota" name="kota">
                                    </select>
                                    @error('kota')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-sm-4 mb-3">
                                    <label for="kecamatan">Kecamatan</label>
                                    <select name="kecamatan" id="kecamatan" class="form-select mb-0">
                                        <option value="" disabled selected>Pilih Kota Dahulu</option>
                                        <input type="text" id="selected_kecamatan" name="kecamatan">
                                    </select>
                                    @error('kecamatan')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-sm-4 mb-3">
                                    <label for="kelurahan">Kelurahan</label>
                                    <select name="kelurahan" id="kelurahan" class="form-select mb-0">
                                        <option value="" disabled selected>Pilih Kecamatan Dahulu</option>
                                        <input type="text" id="selected_kelurahan" name="kelurahan">
                                    </select>
                                    @error('kelurahan')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Edit Mitra</button>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        // get value from select option not id
        $('#provinsi').change(function() {
            if ($(this).val() != '') {
                $('#selected_provinsi').val($('#provinsi option:selected').text());
            } else {
                $('#selected_provinsi').val('');
            }
        });
        $('#kota').change(function() {
            if ($(this).val() != '') {
                $('#selected_kota').val($('#kota option:selected').text());
            } else {
                $('#selected_kota').val('');
            }
        });
        $('#kecamatan').change(function() {
            $('#selected_kecamatan').val($('#kecamatan option:selected').text());
        });
        $('#kelurahan').change(function() {
            $('#selected_kelurahan').val($('#kelurahan option:selected').text());
        });

        // foreach data provinsi from api
        // buatkan logic dapatkan oninput dari select option provinsi dan kirimkan ke api untuk mendapatkan data kota
        // buatkan logic dapatkan oninput dari select option kota dan kirimkan ke api untuk mendapatkan data kecamatan
        // buatkan logic dapatkan oninput dari select option kecamatan dan kirimkan ke api untuk mendapatkan data kelurahan.

        function selectedProvinsi(id) {
            console.log(id);
        }
        // get data kota
        $('#provinsi').on('input', function() {
            let id_provinsi = $(this).val();
            let url =
                `https://api.goapi.id/v1/regional/kota?provinsi_id=${id_provinsi}&api_key=TQpJdXsrIsj9CmBCzKOJLvslWZdKx0`;
            $.ajax({
                url: url,
                type: 'GET',
                dataType: 'json',
                success: function(result) {
                    console.log(result);
                    $('#kota').empty();
                    $('#kota').append(`<option value="" disabled selected>Pilih Kota</option>`);
                    $.each(result.data, function(i, kota) {
                        $('#kota').append(`<option value="${kota.id}">${kota.name}</option>`);
                    });
                }
            });
        });
    </script>
@endsection
