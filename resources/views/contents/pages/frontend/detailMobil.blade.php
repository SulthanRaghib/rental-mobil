@extends('mainfrontend')
@section('styles')
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ url('fe/css/styles.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="css/custom.css" />
    {{-- sweet alert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
                                            <span>P3K</span>
                                        </li>
                                        <li>
                                            <i class="ri-close-circle-line text-secondary"></i>
                                            <span>CHARGER</span>
                                        </li>
                                        <li>
                                            <i class="ri-close-circle-line text-secondary"></i>
                                            <span>AUDIO</span>
                                        </li>
                                        <li>
                                            <i class="ri-checkbox-circle-line"></i>
                                            <span>AC</span>
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
                                        <span style="font-size: 1rem" class="text-primary">Rp.
                                            {{ number_format($mobil->harga_sewa, 0, ',', '.') }} /</span>Hari
                                    </div>
                                </div>
                                <ul class="list-unstyled list-style-group">
                                    <li class="border-bottom p-2 d-flex justify-content-between">
                                        <span>Bahan Bakar</span>
                                        <span style="font-weight: 600">{{ $mobil->nama_bahan_bakar }}</span>
                                    </li>
                                    <li class="border-bottom p-2 d-flex justify-content-between">
                                        <span>Jumlah Kursi</span>
                                        <span style="font-weight: 600">{{ $mobil->kapasitas }}</span>
                                    </li>
                                    <li class="border-bottom p-2 d-flex justify-content-between">
                                        <span>Type Mobil</span>
                                        <span style="font-weight: 600">{{ $mobil->nama_type_mobil }}</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- Product actions-->
                        <div class="card-footer border-top-0 bg-transparent">

                            @if (!Auth::check())
                                <div class="text-center">
                                    <button
                                        class="btn d-flex align-items-center justify-content-center btn-primary mt-auto col-12"
                                        style="column-gap: 0.4rem" id="to-login" onclick="toLogin()" type="submit">Sewa
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
                                    <div class="card-body">
                                        <form action="{{ route('sewa.store') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="mobil_id" value="{{ $mobil->id }}">
                                            <div class="mb-3">
                                                <label for="nama">Nama</label>
                                                <input type="text" name="nama" id="nama"
                                                    class="form-control mb-3" placeholder="Masukkan Nama"
                                                    value="{{ Auth::user()->nama }}">
                                                @error('nama')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="mb-3">
                                                <label for="no_telp">No. Handphone</label>
                                                <input type="text" name="no_telp" id="no_telp"
                                                    class="form-control mb-3" placeholder="Masukkan No. Handphone">
                                                @error('no_telp')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="mb-3">
                                                <label for="alamat">Alamat</label>
                                                <textarea name="alamat" id="alamat" cols="30" rows="5" class="form-control mb-3"
                                                    placeholder="Masukkan Alamat"></textarea>
                                                @error('alamat')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="mb-3">
                                                <label for="tgl_sewa">Tanggal Sewa</label>
                                                <input type="date" name="tgl_sewa" id="tgl_sewa"
                                                    class="form-control mb-3">
                                                @error('tgl_sewa')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="mb-3">
                                                <label for="tgl_selesai">Tanggal Selesai</label>
                                                <input type="date" name="tgl_selesai" id="tgl_selesai"
                                                    class="form-control mb-3">
                                                @error('tgl_selesai')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="mb-3">
                                                <label for="total_harga">Total Harga</label>
                                                <input type="text" name="total_harga" id="total_harga"
                                                    class="form-control mb-3" value="{{ $mobil->harga_sewa }}" readonly>
                                                @error('total_harga')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <button type="submit" class="btn btn-primary">Sewa</button>
                                        </form>
                                    </div>
                                </div>
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
        <script>
            // buat function untuk sweet alert
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
    </section>
@endsection
