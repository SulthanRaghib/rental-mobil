@extends('main')
@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h5 class="card-title">Tambah Mobil</h5>

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
                                    <a href="{{ route('mobil.index') }}" class="btn btn-primary">Kembali</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <form action="{{ route('mobil.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="kode_mobil" class="form-label">Kode Mobil</label>
                            <input type="text" class="form-control" id="kode_mobil" name="kode_mobil"
                                value="{{ 'MBL-' . rand(100, 999) }}" readonly>
                            <span class="text-danger">*Kode Mobil akan dibuat secara otomatis</span>
                            @error('kode_mobil')
                                <span class="text-danger mt-2">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="no_polisi">Plat Nomor</label>
                            <div class="row mt-2">
                                <div class="col-sm-2">
                                    {{-- <label for="no_polisi">Kode Daerah</label> --}}
                                    <input type="text" class="form-control" id="kode_daerah" placeholder="Kode Daerah"
                                        name="kode_daerah" value="{{ old('kode_daerah') }}" maxlength="2">
                                    @error('kode_daerah')
                                        <span class="text-danger mt-2">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-sm-7">
                                    {{-- <label for="no_polisi">Nomor Polisi</label> --}}
                                    <input type="number" class="form-control" id="no_polisi" placeholder="Nomor Polisi"
                                        name="no_polisi" value="{{ old('no_polisi') }}"
                                        oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                        maxlength="4">
                                    @error('no_polisi')
                                        <span class="text-danger mt-2">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-sm-3">
                                    {{-- <label for="no_polisi">Kode Daftar Wilayah</label> --}}
                                    <input type="text" class="form-control" id="kode_wilayah"
                                        placeholder="Kode Daftar Wilayah" name="kode_wilayah"
                                        value="{{ old('kode_wilayah') }}" maxlength="3" pattern="[A-Z]{3}">
                                    @error('kode_wilayah')
                                        <span class="text-danger mt-2">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="row mt-2">
                                <div class="col-sm-4">
                                    <label for="merek_id" class="form-label">Merek</label>
                                    <select class="form-select" id="merek_id" name="merek_id">
                                        <option selected disabled>Pilih Merek</option>
                                        @foreach ($merek as $m)
                                            <option value="{{ $m->id }}" @selected(old('merek_id') == $m->id)>
                                                {{ $m->nama_merek }}</option>
                                        @endforeach
                                    </select>
                                    @error('merek_id')
                                        <span class="text-danger mt-2">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-sm-4">
                                    <label for="type_mobil_id" class="form-label">Tipe Mobil</label>
                                    <select class="form-select" id="tipe_mobil_id" name="tipe_mobil_id">
                                        <option selected disabled>Pilih Tipe Mobil</option>
                                        @foreach ($type_mobil as $tm)
                                            <option value="{{ $tm->id }}" @selected(old('tipe_mobil_id') == $tm->id)>
                                                {{ $tm->nama_type_mobil }}</option>
                                        @endforeach
                                    </select>
                                    @error('tipe_mobil_id')
                                        <span class="text-danger mt-2">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-sm-4">
                                    <label for="bahan_bakar" class="form-label">Bahan Bakar</label>
                                    <select class="form-select" id="bahan_bakar_id" name="bahan_bakar_id">
                                        <option selected disabled>Pilih Bahan Bakar</option>
                                        @foreach ($bahan_bakar as $bb)
                                            <option value="{{ $bb->id }}" @selected(old('bahan_bakar_id') == $bb->id)>
                                                {{ $bb->nama_bahan_bakar }}</option>
                                        @endforeach
                                    </select>
                                    @error('bahan_bakar_id')
                                        <span class="text-danger mt-2">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="row mt-2">
                                <div class="col-sm-6">
                                    <label for="kapasitas" class="form-label">Kapasitas</label>
                                    <input type="number" class="form-control" id="kapasitas" name="kapasitas"
                                        value="{{ old('kapasitas') }}">
                                    @error('kapasitas')
                                        <span class="text-danger mt-2">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-sm-6">
                                    <label for="harga_sewa" class="form-label">Harga Sewa</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="harga_sewa" name="harga_sewa"
                                            value="{{ old('harga_sewa') }}">
                                        <span class="input-group-text" id="basic-addon1">/ Jam</span>
                                    </div>
                                    @error('harga_sewa')
                                        <span class="text-danger mt-2">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="my-3">
                            <div class="row mt-2">
                                <div class="col-sm-8">
                                    <label for="gambar_mobil" class="form-label">Gambar Mobil</label>
                                    <div class="input-group">
                                        <input type="file" class="form-control" id="gambar_mobil"
                                            aria-describedby="inputGroupFileAddon04" aria-label="Upload"
                                            name="gambar_mobil" value="{{ old('gambar_mobil') }}">
                                        <button class="btn btn-outline-secondary" type="button"
                                            id="hapus_gambar">Hapus</button>
                                    </div>
                                    @error('gambar_mobil')
                                        <span class="text-danger mt-2">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-sm-4">
                                    <div id="show_image"></div>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Tambah Mobil</button>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        let harga_sewa = document.getElementById('harga_sewa');
        harga_sewa.addEventListener('keyup', function(e) {
            harga_sewa.value = formatRupiah(this.value, 'Rp. ');
        });

        /* Fungsi */
        function formatRupiah(angka, prefix) {
            let number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
        }
    </script>
    <script>
        let gambar_mobil = document.getElementById('gambar_mobil');
        gambar_mobil.addEventListener('change', function(e) {
            let show_image = document.getElementById('show_image');
            show_image.innerHTML =
                `<img src="${URL.createObjectURL(e.target.files[0])}" alt="Gambar Mobil" class="img-fluid mt-2" width="100%">`;
        });
    </script>
    <script>
        let hapus_gambar = document.getElementById('hapus_gambar');
        hapus_gambar.addEventListener('click', function(e) {
            let show_image = document.getElementById('show_image');
            let gambar_mobil = document.getElementById('gambar_mobil');
            show_image.innerHTML = '';
            gambar_mobil.value = '';
        });
    </script>
    <script>
        let kode_daerah = document.getElementById('kode_daerah');
        let kode_wilayah = document.getElementById('kode_wilayah');
        kode_daerah.addEventListener('keyup', function(e) {
            kode_daerah.value = kode_daerah.value.toUpperCase();
        });
        kode_wilayah.addEventListener('keyup', function(e) {
            kode_wilayah.value = kode_wilayah.value.toUpperCase();
        });
        // kode daerah dan kode wilayah hanya bisa diisi huruf
        kode_daerah.addEventListener('keypress', function(e) {
            let char = String.fromCharCode(e.which);
            if (!(/[a-zA-Z]/.test(char))) {
                e.preventDefault();
            }
        });
        kode_wilayah.addEventListener('keypress', function(e) {
            let char = String.fromCharCode(e.which);
            if (!(/[a-zA-Z]/.test(char))) {
                e.preventDefault();
            }
        });
    </script>
@endsection
