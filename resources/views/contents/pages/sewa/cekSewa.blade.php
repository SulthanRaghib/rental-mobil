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
                <h1 class="display-4 fw-bolder">Cek Sewa</h1>
            </div>
        </div>
    </header>

    @if (!Auth::check())
        <div class="container px-4 px-lg-5 mt-5">
            <div class="alert alert-danger" role="alert">
                Silahkan login terlebih dahulu untuk melihat data sewa anda
            </div>
        </div>
    @else
        <div class="container px-4 px-lg-5 mt-5">
            <a href="{{ route('homepage') }}" class="btn-sm btn-primary float-end text-decoration-none"> <i
                    class="ri-arrow-left-line"></i>
                Kembali</a>
        </div>

        <!-- Section-->
        <section class="pb-5 pt-1">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row justify-content-center">
                    @foreach ($sewa as $s)
                        @if ($s->user_id != Auth::user()->id)
                            <div class="alert alert-danger" role="alert">
                                Data sewa tidak ditemukan
                            </div>
                        @else
                            <div class="card mb-3" style="max-width: 100%;">
                                <div class="card-header bg-transparent border-success">Kode Mobil: {{ $s->kode_mobil }}
                                    <strong class="btn-sm btn-warning float-end">{{ $s->status }}</strong>
                                </div>
                                <div class="card-body">
                                    <div class="row g-0">
                                        <div class="col-md-3 col-lg-2">
                                            <img src="{{ url('assets/img/mobil/' . $s->gambar_mobil) }}"
                                                class="img-fluid rounded-start" alt="gambar mobil">
                                        </div>

                                        <div class="col-md-9 col-lg-6">
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $s->nama_merek }}</h5>
                                                <p class="card-text mb-0">
                                                    <span>
                                                        <img src="https://www.svgrepo.com/show/520607/car-wheel.svg"
                                                            alt="type_mobil" width="23px"
                                                            class="me-1">{{ $s->nama_type_mobil }}
                                                    </span>
                                                </p>
                                                <p class="card-text mb-0">
                                                    <span>
                                                        <img src="https://svgshare.com/i/xsb.svg" alt="kapasitas"
                                                            width="23px" class="me-1">{{ $s->kapasitas }} Kursi
                                                    </span>
                                                <p class="card-text">
                                                    <small class="text-body-secondary">
                                                        Pemesanan dari tanggal {{ $s->tanggal_sewa }}, Jam
                                                        {{ $s->waktu_sewa }}
                                                        <br>sampai tanggal {{ $s->tanggal_kembali }}, Jam
                                                        {{ $s->waktu_kembali }}
                                                    </small>
                                                </p>
                                            </div>
                                        </div>

                                        <div class="col-lg-4">
                                            <div class="card-body">
                                                <h5 class="card-title">Detail Pembayaran</h5>
                                                <p class="card-text mb-0">
                                                    <span>Harga Sewa :
                                                        {{ 'Rp. ' . number_format($s->harga_sewa, 0, ',', '.') }}
                                                        / Hari</span>
                                                </p>
                                                <p class="card-text mb-0">
                                                    <span>Durasi :
                                                        @php
                                                            $tanggal_sewa = \Carbon\Carbon::parse($s->tanggal_sewa);
                                                            $tanggal_kembali = \Carbon\Carbon::parse($s->tanggal_kembali);
                                                            $jam_sewa = \Carbon\Carbon::parse($s->tanggal_sewa);
                                                            $jam_kembali = \Carbon\Carbon::parse($s->tanggal_kembali);
                                                            
                                                            // totalkan jam berdasarkan selisih hari
                                                            $total_jam_sewa = $tanggal_sewa->diffInDays($tanggal_kembali);
                                                            $total_jam_kembali = $jam_sewa->diffInHours($jam_kembali) % 24;
                                                            
                                                            // total sisa menit
                                                            $total_menit_sewa = $tanggal_sewa->diffInMinutes($tanggal_kembali) % 60;
                                                            
                                                            // durasi
                                                            $durasi = $total_jam_sewa . ' Hari ' . $total_jam_kembali . ' Jam ' . $total_menit_sewa . ' Menit';
                                                            echo $durasi;
                                                            
                                                        @endphp
                                                    </span>
                                                </p>
                                                <p class="card-text mb-0">
                                                    {{-- buat total sewa dengan h1 --}}
                                                    <span>Total Sewa :
                                                        <h1 class="text-danger fw-bold">
                                                            {{ 'Rp. ' . number_format($s->total_bayar, 0, ',', '.') }}
                                                        </h1>
                                                    </span>
                                                </p>

                                                {{-- buat buuton bayar --}}
                                                @if ($s->status == 'Menunggu Pembayaran')
                                                    <a href="{{ route('sewa.pembayaran') }}"
                                                        class="btn btn-sm btn-primary mt-3">Bayar</a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </section>
    @endif
@endsection
