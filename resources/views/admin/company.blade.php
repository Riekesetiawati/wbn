@extends('layouts.app')
@section('title', 'Manajemen Perusahaan')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Data Perusahaan - Event: {{ $events->title }}</h5>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createCompanyModal">
                        <i class="bi bi-plus-circle"></i> Tambah Perusahaan
                    </button>
                </div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead class="table-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Perusahaan</th>
                                    <th>Produk</th>
                                    <th>Wilayah ECP</th>
                                    <th>Tahun</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($events->company as $index => $company)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $company->nama_perusahaan }}</td>
                                        <td>{{ $company->produk }}</td>
                                        <td>{{ $company->wilayah_ecp }}</td>
                                        <td>{{ $company->tahun }}</td>
                                        <td>
                                            <form action="{{ route('admin.company.destroy', $company->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">
                                                    <i class="bi bi-trash"></i> Hapus
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">Tidak ada data perusahaan</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="{{ route('admin.event.index') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left"></i> Kembali ke Daftar Event
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Tambah Perusahaan -->
<div class="modal fade" id="createCompanyModal" tabindex="-1" aria-labelledby="createCompanyModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createCompanyModalLabel">Tambah Data Perusahaan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.company.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nama_perusahaan" class="form-label">Nama Perusahaan <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="nama_perusahaan" name="nama_perusahaan" value="{{ old('nama_perusahaan') }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="produk" class="form-label">Produk <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="produk" name="produk" value="{{ old('produk') }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="wilayah_ecp" class="form-label">Wilayah ECP <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="wilayah_ecp" name="wilayah_ecp" value="{{ old('wilayah_ecp') }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="tahun" class="form-label">Tahun <span class="text-danger">*</span></label>
                        <input type="number" class="form-control" id="tahun" name="tahun" value="{{ old('tahun', date('Y')) }}" required>
                    </div>
                    <input type="hidden" name="event_id" value="{{ $events->id }}">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection