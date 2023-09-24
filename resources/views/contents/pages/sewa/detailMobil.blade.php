@extends('mainfrontend')
@section('styles')
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ url('fe/css/styles.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ url('fe/css/custom.css') }}" />
    {{-- sweet alert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        /* hidden radio button */
        input[type='radio'] {
            display: none;
        }

        /* buat style untuk label radio */
        input[type='radio']+label {
            border: 2px solid #007bff;
            border-radius: 5px;
            padding: 0.2rem 1rem;
            margin: 0rem 1rem;
            cursor: pointer;
        }

        /* buat style untuk label radio yang di klik */
        input[type='radio']:checked+label {
            background-color: #007bff;
            color: #fff;
            border-color: #007bff;
        }
    </style>
@endsection

@section('content')
    <!-- Header-->
    <header class="bg-dark py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">Detail Mobil</h1>
            </div>
        </div>
    </header>

    <div class="container px-4 px-lg-5 mt-5">
        <a href="{{ route('homepage') }}" class="btn-sm btn-primary float-end text-decoration-none"> <i
                class="ri-arrow-left-line"></i>
            Kembali</a>
    </div>

    <!-- Section-->
    <section class="pb-5 pt-1">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row justify-content-center">
                <div class="col-lg-6 mb-5">
                    <div class="card h-100">
                        <!-- Product image-->
                        <img class="card-img-top" src="{{ asset('assets/img/mobil/' . $mobil->gambar_mobil) }}"
                            alt="gambar mobil" />
                        <!-- Product details-->
                        <div class="card-body card-body-custom pt-4">
                            <div>
                                <!-- Product name-->
                                <h3 class="fw-bolder text-primary">
                                    Deskripsi
                                </h3>
                                <p>
                                    Lorem ipsum dolor, sit amet consectetur
                                    adipisicing elit. Ipsa dolor corrupti
                                    porro, sit ex nemo itaque, est
                                    voluptatum illum dignissimos facilis
                                    alias facere rem consequatur?
                                </p>
                                <div class="mobil-info-list border-top pt-4">
                                    <ul class="list-unstyled">
                                        <li>
                                            <i class="ri-checkbox-circle-line"></i>
                                            <small>P3K</small>
                                        </li>
                                        <li>
                                            <i class="ri-close-circle-line text-secondary"></i>
                                            <small>CHARGER</small>
                                        </li>
                                        <li>
                                            <i class="ri-close-circle-line text-secondary"></i>
                                            <small>AUDIO</small>
                                        </li>
                                        <li>
                                            <i class="ri-checkbox-circle-line"></i>
                                            <small>AC</small>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 mb-5">
                    <div class="card">
                        <!-- Product details-->
                        <div class="card-body card-body-custom pt-4">
                            <div class="text-center">
                                <!-- Product name-->
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5 class="fw-bolder">Special Item</h5>
                                    <div class="rent-price mb-3">
                                        <small style="font-size: 1rem" class="text-primary">Rp.
                                            {{ number_format($mobil->harga_sewa, 0, ',', '.') }} /</small>Hari
                                    </div>
                                </div>
                                <ul class="list-unstyled list-style-group">
                                    <li class="border-bottom p-2 d-flex justify-content-between">
                                        <small>Bahan Bakar</small>
                                        <small style="font-weight: 600">{{ $mobil->nama_bahan_bakar }}</small>
                                    </li>
                                    <li class="border-bottom p-2 d-flex justify-content-between">
                                        <small>Jumlah Kursi</small>
                                        <small style="font-weight: 600">{{ $mobil->kapasitas }}</small>
                                    </li>
                                    <li class="border-bottom p-2 d-flex justify-content-between">
                                        <small>Type Mobil</small>
                                        <small style="font-weight: 600">{{ $mobil->nama_type_mobil }}</small>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- Product actions-->
                        <div class="card-footer border-top-0 bg-transparent">

                            {{-- jika mobil tidak terdesia --}}
                            @if ($mobil->status == 'Tidak Tersedia')
                                <div class="text-center">
                                    <button
                                        class="btn d-flex align-items-center justify-content-center btn-danger mt-auto col-12"
                                        style="column-gap: 0.4rem" id="to-login" type="submit" disabled>Mobil Tidak
                                        Tersedia
                                </div>
                            @else
                                @if (!Auth::check())
                                    <div class="text-center">
                                        <button
                                            class="btn d-flex align-items-center justify-content-center btn-primary mt-auto col-12"
                                            style="column-gap: 0.4rem" id="to-login" onclick="toLogin()"
                                            type="submit">Sewa
                                            Mobil
                                            <i class="ri-arrow-right-line"></i>
                                    </div>
                                @else
                                    <div class="text-center">
                                        <button
                                            class="btn d-flex align-items-center justify-content-center btn-primary mt-auto col-12"
                                            style="column-gap: 0.4rem" id="show-sewa-input">Sewa Mobil
                                            <i class="ri-arrow-right-line"></i>
                                    </div>

                                    <div class="card mt-3" id="sewa-input" style="display: none">

                                        <div class="card-body" id="tanpa-sopir">
                                            <form action="{{ route('sewa.store') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="mobil_id" value="{{ $mobil->id }}">
                                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                                <div class="mb-3">
                                                    <label for="nama">Nama</label>
                                                    <input type="text" name="nama" id="nama"
                                                        class="form-control mb-0" placeholder="Masukkan Nama"
                                                        value="{{ Auth::user()->nama }}">
                                                    <small class="text-muted">Nama akan otomatis terisi jika anda sudah
                                                        login</small>
                                                    @error('nama')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>

                                                <div class="mb-3">
                                                    <label for="no_ktp">No. KTP</label>
                                                    <input type="text" name="no_ktp" id="no_ktp"
                                                        class="form-control mb-0" placeholder="Masukkan No. KTP">
                                                    @error('no_ktp')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>

                                                <div class="mb-3">
                                                    <label for="no_telp">No. Handphone</label>
                                                    <input type="text" name="no_telp" id="no_telp"
                                                        class="form-control mb-0" placeholder="Masukkan No. Handphone"
                                                        value="{{ old('no_telp') }}">
                                                    @error('no_telp')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>

                                                <div class="row align-items-end">
                                                    <div class="col-6">
                                                        <div class="mb-3">
                                                            <label for="tanggal_sewa">Tanggal Sewa</label>
                                                            <input type="date" name="tanggal_sewa" id="tanggal_sewa"
                                                                class="form-control mb-0"
                                                                value="{{ old('tanggal_sewa') }}">
                                                            @error('tanggal_sewa')
                                                                <small class="text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="mb-3">
                                                            <label for="waktu_sewa">Waktu Sewa</label>
                                                            <input type="time" name="waktu_sewa" id="waktu_sewa"
                                                                class="form-control mb-0"
                                                                value="{{ old('waktu_sewa') }}">
                                                            @error('waktu_sewa')
                                                                <small class="text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="mb-3">
                                                            <label for="tanggal_kembali">Tanggal Kembali</label>
                                                            <input type="date" name="tanggal_kembali"
                                                                id="tanggal_kembali" class="form-control mb-0"
                                                                value="{{ old('tanggal_kembali') }}">
                                                            @error('tanggal_kembali')
                                                                <small class="text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <label for="waktu_kembali">Waktu Kembali</label>
                                                        <input type="time" name="waktu_kembali" id="waktu_kembali"
                                                            class="form-control mb-0" value="{{ old('waktu_kembali') }}">
                                                        @error('waktu_kembali')
                                                            <small class="text-danger">{{ $message }}</small>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="total_bayar">Total Harga</label>
                                                    <input type="text" name="total_bayar" id="total_bayar"
                                                        class="form-control mb-0" value="{{ old('total_bayar') }}"
                                                        readonly>
                                                    @error('total_bayar')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>


                                                <button type="submit" class="btn btn-primary">Sewa</button>
                                            </form>
                                        </div>
                                    </div>
                                @endif
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <script>
            const showSewaInput = document.getElementById('show-sewa-input');
            const sewaInput = document.getElementById('sewa-input');
            showSewaInput.addEventListener('click', function() {
                if (sewaInput.style.display == 'none') {
                    sewaInput.style.display = 'block';
                    showSewaInput.style.display = 'none';
                } else {
                    sewaInput.style.display = 'none';
                    showSewaInput.style.display = 'block';
                }
            });
        </script>
        <script></script>
        <script>
            function toLogin() {
                Swal.fire({
                    icon: 'info',
                    title: 'Anda belum login',
                    text: 'Silahkan login terlebih dahulu untuk menyewa mobil',
                    showCancelButton: true,
                    confirmButtonText: 'Login',
                    cancelButtonText: 'Batal',
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "{{ route('login') }}";
                    }
                })
            }
        </script>

        <script>
            const tanggalSewa = document.getElementById('tanggal_sewa');
            const waktuSewa = document.getElementById('waktu_sewa');
            const tanggalKembali = document.getElementById('tanggal_kembali');
            const waktuKembali = document.getElementById('waktu_kembali');
            const totalBayar = document.getElementById('total_bayar');
            const hargaSewa = {{ $mobil->harga_sewa }};
            const formatRupiah = new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR',
                minimumFractionDigits: 0
            });

            tanggalSewa.addEventListener('change', function() {
                const tglSewa = new Date(tanggalSewa.value);
                const tglKembali = new Date(tanggalKembali.value);
                const selisihHari = Math.abs(tglKembali - tglSewa) / (1000 * 60 * 60 * 24);
                const tglSekarang = new Date();
                if (tanggalSewa.value == '' || tanggalKembali.value == '') {
                    totalBayar.value = '';
                } else if (tanggalSewa.value == tanggalKembali.value) {
                    totalBayar.value = formatRupiah.format(hargaSewa);
                } else {
                    totalBayar.value = formatRupiah.format(hargaSewa * selisihHari);
                }
            });

            tanggalKembali.addEventListener('change', function() {
                const tglSewa = new Date(tanggalSewa.value);
                const tglKembali = new Date(tanggalKembali.value);
                const selisihHari = Math.abs(tglKembali - tglSewa) / (1000 * 60 * 60 * 24);
                if (tanggalSewa.value == '' || tanggalKembali.value == '') {
                    totalBayar.value = '';
                } else if (tanggalSewa.value == tanggalKembali.value) {
                    totalBayar.value = formatRupiah.format(hargaSewa);
                } else {
                    totalBayar.value = formatRupiah.format(hargaSewa * selisihHari);
                }
            });
        </script>
    </section>
@endsection
