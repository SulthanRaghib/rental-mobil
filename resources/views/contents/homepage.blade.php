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
@endsection

@section('content')
    <!-- Header-->
    <header class="bg-dark py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">Sewa Mobil</h1>
                <p class="lead fw-normal text-white-50 mb-0">
                    hanya dengan satu sentuhan
                </p>
            </div>
        </div>
    </header>
    <!-- Section-->
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <h3 class="text-center mb-3">Daftar Mobil</h3>

            {{-- buat button search, apabila di klik, muncul inputan --}}
            <div class="row text-center mb-3">
                <div class="col-md-12">
                    Ingin mencari mobil yang sesuai dengan keinginan anda? klik tombol ini
                    <button class="btn btn-primary" id="btn-search"><i class="bi bi-search"></i> Cari</button>
                </div>
            </div>

            {{-- buat inputan search di tengah tengah --}}
            <div class="row mb-5" id="search">
                <form action="{{ route('search') }}" method="GET">
                    @csrf
                    {{-- Type Mobil --}}
                    <div class="form-group mb-3">
                        <div class="col-md-8 offset-md-2">
                            <select class="form-select" name="type_mobil" id="type_mobil">
                                <option value="">Pilih Type Mobil</option>
                                @foreach ($type_mobil as $tm)
                                    <option value="{{ $tm->id }}">{{ $tm->nama_type_mobil }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>


                </form>
            </div>

            <div class="row gx-4 gx-lg-5 row-cols-1 row-cols-md-3 row-cols-xl-3 justify-content-center">
                @foreach ($mobil as $m)
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Sale badge-->
                            @if ($m->status == 'Tersedia')
                                <div class="badge badge-custom bg-success text-white position-absolute"
                                    style="top: 0; right: 0">
                                    {{ $m->status }}
                                </div>
                            @else
                                <div class="badge badge-custom bg-danger text-white position-absolute"
                                    style="top: 0; right: 0">
                                    {{ $m->status }}
                                </div>
                            @endif
                            <!-- Product image-->
                            <img class="card-img-top" src="{{ asset('assets/img/mobil/' . $m->gambar_mobil) }}"
                                alt="gambar mobil" />
                            <!-- Product details-->
                            <div class="card-body card-body-custom pt-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">{{ $m->nama_mobil }}</h5>
                                    <!-- Product price-->
                                    <div class="rent-price mb-3">
                                        <span class="text-primary">{{ 'Rp. ' . number_format($m->harga_sewa, 0, ',', '.') }}
                                            /</span>Hari
                                    </div>
                                    <ul class="list-unstyled list-style-group">
                                        <li class="border-bottom p-2 d-flex justify-content-between">
                                            <span>Bahan bakar</span>
                                            <span style="font-weight: 600">{{ $m->nama_bahan_bakar }}</span>
                                        </li>
                                        <li class="border-bottom p-2 d-flex justify-content-between">
                                            <span>Jumlah Kursi</span>
                                            <span style="font-weight: 600">{{ $m->kapasitas }}</span>
                                        </li>
                                        <li class="border-bottom p-2 d-flex justify-content-between">
                                            <span>Type Mobil</span>
                                            <span style="font-weight: 600">{{ $m->nama_type_mobil }}</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Product actions-->
                            @if ($m->status == 'Tersedia')
                                <div class="card-footer border-top-0 bg-transparent">
                                    <div class="text-center">
                                        <a class="btn btn-primary mt-auto" href="#">Sewa</a>
                                        <a class="btn btn-info mt-auto text-white"
                                            href="{{ route('cek-mobil', $m->id) }}">Detail</a>
                                    </div>
                                </div>
                            @else
                                {{-- tidak bisa sewa --}}
                                <div class="card-footer border-top-0 bg-transparent">
                                    <div class="text-center">
                                        <a class="btn btn-danger mt-auto" href="#">Tidak Tersedia</a>
                                        <a class="btn btn-info mt-auto text-white"
                                            href="{{ route('cek-mobil', $m->id) }}">Detail</a>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- custom pagination --}}
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="d-flex justify-content-center">
                    {!! $mobil->withQueryString()->links('vendor.pagination.bootstrap-5') !!}
                </div>
            </div>
        </div>
    </section>

    <script>
        let btnSearch = document.getElementById('btn-search');
        let search = document.getElementById('search');
        search.style.display = 'none';
        btnSearch.addEventListener('click', function() {
            if (search.style.display == 'none') {
                search.style.display = 'block';
                btnSearch.style.backgroundColor = '#dc3545';
                btnSearch.innerHTML = '<i class="bi bi-x"></i> Batal';

            } else {
                search.style.display = 'none';
                btnSearch.innerHTML = '<i class="bi bi-search"></i> Cari';
                btnSearch.style.backgroundColor = '#0d6efd';
            }
        });
    </script>

    @if (session('welcome'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Welcome',
                text: '{{ session('welcome') }}',
                confirmButtonText: 'Oke'
            })
        </script>
    @endif

    @if (session()->has('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: '{{ session('success') }}',
                showConfirmButton: false,
                timer: 1500
            })
        </script>
    @endif
@endsection
