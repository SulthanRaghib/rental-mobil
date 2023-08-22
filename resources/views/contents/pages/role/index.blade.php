@extends('main')
@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h5 class="card-title">Table Role</h5>

                    <a href="{{ route('role.create') }}" class="btn btn-sm btn-primary my-3">
                        Tambah Role <i class="bi bi-plus-circle pl-5"></i>
                    </a>
                </div>

                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Nama Role</th>
                                <th>Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($role as $r)
                                <tr>
                                    <td>{{ $r->nama_role }}</td>
                                    @if ($r->nama_role == 'admin' || $r->nama_role == 'user')
                                        <td>
                                            <span class="badge bg-secondary">Tidak dapat di edit</span>
                                            <span class="badge bg-secondary">Tidak dapat di hapus</span>
                                        </td>
                                    @else
                                        <td>
                                            <a href="{{ route('role.edit', $r->id) }}" class="btn btn-sm btn-warning">
                                                Edit <i class="bi bi-pencil-square"></i>
                                            </a>
                                            <form action="{{ route('role.destroy', $r->id) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Apakah anda yakin ingin menghapus data ID={{ $r->id }} ini?')">
                                                    Hapus <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

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
