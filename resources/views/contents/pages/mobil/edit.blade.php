@extends('main')
@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h5 class="card-title">Edit Mobil</h5>

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
                    <form action="{{ route('mobil.update', $mobil->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        {{-- get user id --}}
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

                        <div class="mb-3">
                            <label for="kode_mobil" class="form-label">Kode Mobil</label>
                            <input type="text" class="form-control" id="kode_mobil" name="kode_mobil"
                                value="{{ $mobil->kode_mobil }}" readonly>
                            <div class="text-danger">
                                <small>*Kode mobil tidak dapat diubah</small>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="no_polisi">Plat Nomor</label>
                            <div class="row mt-2">
                                <div class="col-sm-2">
                                    {{-- ambil kata awal kode daerah dari plat_nomer dengan explode --}}
                                    <input type="text" class="form-control" id="kode_daerah" name="kode_daerah"
                                        value="{{ explode(' ', $mobil->plat_nomor)[0] }}" maxlength="2">
                                    @error('kode_daerah')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-sm-7">
                                    <input type="number" class="form-control" id="no_polisi" name="no_polisi"
                                        value="{{ explode(' ', $mobil->plat_nomor)[1] }}"
                                        oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                        maxlength="4">
                                    @error('no_polisi')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" id="kode_wilayah" name="kode_wilayah"
                                        value="{{ explode(' ', $mobil->plat_nomor)[2] }}" maxlength="3">
                                    @error('kode_wilayah')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="row mt-2">
                                <div class="col-sm-4">
                                    <label for="merk_id" class="form-label">Merk</label>
                                    <select class="form-select" id="merek_id" name="merek_id">
                                        <option value="{{ $mobil->merek_id }}" selected>{{ $mobil->merek->nama_merek }}
                                        </option>
                                        @foreach ($merek as $m)
                                            @if ($m->id != $mobil->merek_id)
                                                <option value="{{ $m->id }}">{{ $m->nama_merek }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @error('merek_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-sm-4">
                                    <label for="type_mobil_id" class="form-label">Tipe Mobil</label>
                                    <select class="form-select" id="type_mobil_id" name="type_mobil_id">
                                        <option value="{{ $mobil->type_mobil_id }}" selected>
                                            {{ $mobil->type_mobil->nama_type_mobil }}</option>
                                        @foreach ($type_mobil as $tm)
                                            @if ($tm->id != $mobil->type_mobil_id)
                                                <option value="{{ $tm->id }}">{{ $tm->nama_type_mobil }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @error('type_mobil_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-sm-4">
                                    <label for="bahan_bakar_id" class="form-label">Bahan Bakar</label>
                                    <select class="form-select" id="bahan_bakar_id" name="bahan_bakar_id">
                                        <option value="{{ $mobil->bahan_bakar_id }}" selected>
                                            {{ $mobil->bahan_bakar->nama_bahan_bakar }}</option>
                                        @foreach ($bahan_bakar as $bb)
                                            @if ($bb->id != $mobil->bahan_bakar_id)
                                                <option value="{{ $bb->id }}">{{ $bb->nama_bahan_bakar }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @error('bahan_bakar_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="row mt-2">
                                <div class="col-sm-4">
                                    <label for="kapasitas" class="form-label">Kapasitas</label>
                                    <input type="number" class="form-control" id="kapasitas" name="kapasitas"
                                        value="{{ $mobil->kapasitas }}">
                                    @error('kapasitas')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-sm-4">
                                    <label for="harga_sewa" class="form-label">Harga Sewa</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="harga_sewa" name="harga_sewa"
                                            value="Rp. {{ number_format($mobil->harga_sewa, 0, ',', '.') }}">
                                        <span class="input-group-text" id="basic-addon1">/ Hari</span>
                                    </div>
                                    @error('harga_sewa')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-sm-4">
                                    <label for="nama_perusahaan" class="form-label">Nama Perusahaan</label>
                                    <input type="text" class="form-control" id="nama_perusahaan"
                                        name="nama_perusahaan" value="{{ $mobil->user->nama_perusahaan }}" readonly>
                                    <small class="text-danger">*Readonly</small>
                                    @error('nama_perusahaan')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="my-3">
                            <div class="row mt-2">
                                <div class="col-sm-8">
                                    <label for="gambar_mobil" class="form-label">Gambar Mobil</label>
                                    <div class="input-group">
                                        <input type="file" class="form-control" id="gambar_mobil" name="gambar_mobil"
                                            value="{{ $mobil->gambar_mobil }}">
                                        <button class="btn btn-outline-secondary" type="button" id="hapus_gambar">
                                            Hapus</button>
                                    </div>
                                    @error('gambar_mobil')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-sm-4">
                                    <img src="{{ asset('assets/img/mobil/' . $mobil->gambar_mobil) }}" alt="gambar_mobil"
                                        class="img-thumbnail img-fluid" id="show_image">
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan</button>

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
        let show_image = document.getElementById('show_image');
        let hapus_gambar = document.getElementById('hapus_gambar');

        gambar_mobil.addEventListener('change', function(e) {
            show_image.src = URL.createObjectURL(e.target.files[0]);
        });

        hapus_gambar.addEventListener('click', function(e) {
            show_image.src = 'https://eshop.czechminibreweries.com/wp-content/uploads/2015/05/not-selected.jpg';
            gambar_mobil.setAttribute('value', '');
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
