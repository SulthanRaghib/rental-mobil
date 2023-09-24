@extends('main')
@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h5 class="card-title">Tambah Mitra</h5>

                    <button type="button" class="btn btn-sm btn-warning my-3" data-bs-toggle="modal"
                        data-bs-target="#staticBackdrop">
                        Kembali <i class="bi bi-arrow-left-circle"></i>
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
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
                    <form action="{{ route('mitra.store') }}" method="POST">
                        @csrf
                        {{-- get user id --}}
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

                        <div class="col-12">
                            <div class="mb-3">
                                <label for="kode_user">Kode Mitra</label>
                                <input type="text" name="kode_user" id="kode_user" class="form-control mb-0"
                                    placeholder="Masukkan Kode Mitra" value="{{ 'MTR-' . rand(100, 999) }}">
                                <small class="text-muted">Kode Mitra akan dibuat secara otomatis</small>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-4">
                                <div class="mb-3">
                                    <label for="nama">Nama Pemilik</label>
                                    <input type="text" name="nama" id="nama" class="form-control mb-0"
                                        placeholder="Masukkan Nama Pemilik" value="{{ old('nama') }}">
                                    @error('nama')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-4">
                                <div class="mb-3">
                                    <label for="nama_perusahaan">Nama Perusahaan</label>
                                    <input type="text" name="nama_perusahaan" id="nama_perusahaan"
                                        class="form-control mb-0" placeholder="Masukkan Nama Perusahaan"
                                        value="{{ old('nama_perusahaan') }}">
                                    @error('nama_perusahaan')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-4">
                                <div class="mb-3">
                                    <label for="no_telp">No Handphone</label>
                                    <input type="text" name="no_telp" id="no_telp" class="form-control mb-0"
                                        placeholder="Masukkan No Handphone" value="{{ old('no_telp') }}">
                                    @error('no_telp')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6 mb-3">
                                <label for="email">Email Mitra</label>
                                <input type="email" name="email" id="email" class="form-control mb-0"
                                    placeholder="Masukkan Email Mitra" value="{{ old('email') }}">
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-6">
                                <label for="password">Password</label>
                                {{-- buat input dengan eye --}}
                                <div class="input-group mb-0">
                                    <input type="password" class="form-control" name="password" id="password"
                                        placeholder="Masukkan Password" value="{{ old('password') }}">
                                    <button class="btn btn-outline-secondary" type="button" id="button-view"> <i
                                            class="bi bi-eye-slash"></i></button>
                                </div>
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="alamat_rental">Alamat Rental</label>
                                <div class="row mt-2">
                                    <div class="col-sm-4 mb-3">
                                        <label for="provinsi">Provinsi</label>
                                        <select name="" id="provinsi" class="form-select mb-0">
                                            <option value="" class="" disabled selected>Pilih Provinsi
                                            </option>
                                            @foreach ($provinsi as $p)
                                                <option value="{{ $p['id'] }}">{{ $p['name'] }}</option>
                                            @endforeach
                                            <input type="text" id="selected_provinsi" name="provinsi" hidden>
                                        </select>
                                        @error('provinsi')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-sm-4 mb-3">
                                        <label for="kota">Kabupaten/Kota</label>
                                        <select name="" id="kota" class="form-select mb-0">
                                            <option value="" disabled selected>Pilih Provinsi Dahulu</option>
                                            <input type="text" id="selected_kota" name="kota" hidden>
                                        </select>
                                        @error('kota')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-sm-4 mb-3">
                                        <label for="kecamatan">Kecamatan</label>
                                        <select name="kecamatan" id="kecamatan" class="form-select mb-0">
                                            <option value="" disabled selected>Pilih Kota Dahulu</option>
                                            <input type="text" id="selected_kecamatan" name="kecamatan" hidden>
                                        </select>
                                        @error('kecamatan')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-sm-4 mb-3">
                                        <label for="kelurahan">Kelurahan</label>
                                        <select name="kelurahan" id="kelurahan" class="form-select mb-0">
                                            <option value="" disabled selected>Pilih Kecamatan Dahulu</option>
                                            <input type="text" id="selected_kelurahan" name="kelurahan" hidden>
                                        </select>
                                        @error('kelurahan')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Tambah Mitra</button>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        // buat input dengan eye
        const togglePassword = document.querySelector('#button-view');
        const password = document.querySelector('#password');
        togglePassword.addEventListener('click', function(e) {
            // toggle the type attribute
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            // toggle the eye slash icon
            this.innerHTML = `<i class="bi bi-eye${type === 'password' ? '-slash' : ''}"></i>`;
        });
    </script>
    <script>
        // get value from select option not id
        $('#provinsi').change(function() {
            $('#selected_provinsi').val($('#provinsi option:selected').text());
        });
        $('#kota').change(function() {
            $('#selected_kota').val($('#kota option:selected').text());
        });
        $('#kecamatan').change(function() {
            $('#selected_kecamatan').val($('#kecamatan option:selected').text());
        });
        $('#kelurahan').change(function() {
            $('#selected_kelurahan').val($('#kelurahan option:selected').text());
        });

        // foreach data provinsi from api
        $(document).ready(function() {
            $('#provinsi').change(function() {
                let provinsi_id = $(this).val();
                let url =
                    `https://api.goapi.id/v1/regional/kota?provinsi_id=${provinsi_id}&api_key=TQpJdXsrIsj9CmBCzKOJLvslWZdKx0`;
                $.ajax({
                    url: url,
                    type: 'GET',
                    dataType: 'json',
                    success: function(result) {
                        $('#kota').empty();
                        $('#kecamatan').empty();
                        $('#kelurahan').empty();
                        $('#kota').append(
                            '<option value="" class="" disabled selected>Pilih Kota</option>'
                        );
                        $('#kecamatan').append(
                            '<option value="" class="" disabled selected>Pilih Kota Dahulu</option>'
                        );
                        $('#kelurahan').append(
                            '<option value="" class="" disabled selected>Pilih Kecamatan Dahulu</option>'
                        );
                        $.each(result.data, function(index, item) {
                            $('#kota').append(
                                `<option value="${item.id}">${item.name}</option>`
                            );
                        });
                    }
                })
            })
        })

        $(document).ready(function() {
            $('#kota').change(function() {
                let kota_id = $(this).val();
                let url =
                    `https://api.goapi.id/v1/regional/kecamatan?kota_id=${kota_id}&api_key=TQpJdXsrIsj9CmBCzKOJLvslWZdKx0`;
                $.ajax({
                    url: url,
                    type: 'GET',
                    dataType: 'json',
                    success: function(result) {
                        $('#kecamatan').empty();
                        $('#kelurahan').empty();
                        $('#kecamatan').append(
                            '<option value="" class="" disabled selected>Pilih Kecamatan</option>'
                        );
                        $('#kelurahan').append(
                            '<option value="" class="" disabled selected>Pilih Kecamatan Dahulu</option>'
                        );
                        $.each(result.data, function(index, item) {
                            $('#kecamatan').append(
                                `<option value="${item.id}">${item.name}</option>`
                            );
                        });
                    }
                })
            })
        })

        $(document).ready(function() {
            $('#kecamatan').change(function() {
                let kecamatan_id = $(this).val();
                let url =
                    `https://api.goapi.id/v1/regional/kelurahan?kecamatan_id=${kecamatan_id}&api_key=TQpJdXsrIsj9CmBCzKOJLvslWZdKx0`;
                $.ajax({
                    url: url,
                    type: 'GET',
                    dataType: 'json',
                    success: function(result) {
                        $('#kelurahan').empty();
                        $('#kelurahan').append(
                            '<option value="" class="" disabled selected>Pilih Kelurahan</option>'
                        );
                        $.each(result.data, function(index, item) {
                            $('#kelurahan').append(
                                `<option value="${item.id}">${item.name}</option>`);
                        });
                    }
                })
            })
        })
    </script>
@endsection
