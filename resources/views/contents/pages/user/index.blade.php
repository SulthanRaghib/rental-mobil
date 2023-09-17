@extends('main')
@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h5 class="card-title">Table User</h5>

                    {{-- <a href="{{ route('user.create') }}" class="btn btn-sm btn-primary my-3">
                        Tambah User <i class="bi bi-plus-circle pl-5"></i>
                    </a> --}}
                </div>

                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama User</th>
                                <th>Email</th>
                                <th>No. Handphone</th>
                                {{-- <th>Action</th> --}}
                            </tr>
                        </thead>

                        @if ($user->isEmpty())
                            <tbody>
                                <tr>
                                    <td colspan="8" class="text-center">Data Kosong</td>
                                </tr>
                            </tbody>
                        @endif
                        <tbody>
                            @foreach ($user as $m)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $m->nama }}</td>
                                    <td>{{ $m->email }}</td>
                                    <td>{{ $m->no_telp }}</td>
                                    {{-- <td>
                                        <a href="{{ route('user.detail', $m->id) }}" class="btn btn-sm btn-info">
                                            Detail <i class="bi bi-eye"></i>
                                        </a>
                                        <a href="{{ route('user.edit', $m->id) }}" class="btn btn-sm btn-warning">
                                            Edit <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <form action="{{ route('user.destroy', $m->id) }}" method="POST"
                                            class="d-inline btn_hapus">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger btn_hapus"
                                                onclick="btn_hapus('{{ $m->nama_pemilik }}')"> <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </td> --}}
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
