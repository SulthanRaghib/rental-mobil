@extends('main')
@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h5 class="card-title">Detail Mobil | Pemilik : {{ Auth::user()->nama_perusahaan }}</h5>

                    <a href="{{ route('mobil.index') }}" class="btn btn-sm btn-warning my-3">
                        Kembali <i class="bi bi-arrow-left-circle pl-5"></i>
                    </a>
                </div>

                <div class="table-responsive">
                    <div class="row m-0">
                        <div class="col-6">
                            <img src="{{ asset('assets/img/mobil/' . $mobil->gambar_mobil) }}" alt="Foto Mobil"
                                class="img-fluid" width="100%">
                        </div>
                        <div class="col-6">
                            <table class="table table-striped table-hover">
                                <tbody>
                                    <tr>
                                        <th>Kode Mobil</th>
                                        <td>{{ $mobil->kode_mobil }}</td>
                                    </tr>
                                    <tr>
                                        <th>Plat Nomor</th>
                                        <td>{{ $mobil->plat_nomor }}</td>
                                    </tr>
                                    <tr>
                                        <th>Merek</th>
                                        <td>{{ $mobil->nama_merek }}</td>
                                    </tr>
                                    <tr>
                                        <th>Tipe Mobil</th>
                                        <td>{{ $mobil->nama_type_mobil }}</td>
                                    </tr>
                                    <tr>
                                        <th>Kapasitas</th>
                                        <td>{{ $mobil->kapasitas }} Orang</td>
                                    </tr>
                                    <tr>
                                        <th>Bahan Bakar</th>
                                        <td>{{ $mobil->nama_bahan_bakar }}</td>
                                    </tr>
                                    <tr>
                                        <th>Status</th>
                                        <td>
                                            @if ($mobil->status == 'Tersedia')
                                                <span class="badge bg-success">Tersedia</span>
                                            @else
                                                <span class="badge bg-danger">Tidak Tersedia</span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Harga Sewa</th>
                                        <td>Rp. {{ number_format($mobil->harga_sewa, 0, ',', '.') }}/hari</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
