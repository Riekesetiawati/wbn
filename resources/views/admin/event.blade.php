@extends('layouts.app')
@section('title', 'Manajemen Event')
@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2><i class="fas fa-calendar-alt"></i> Manajemen Event</h2>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addEventModal">
            <i class="fas fa-plus"></i> Tambah Event Baru
        </button>
    </div>
    
    <!-- Pencarian dan Filter Event -->
    <div class="card mb-4">
        <div class="card-body">
            <div class="row">
                <div class="col-md-8">
                    <form action="{{ route('admin.event.index') }}" method="GET">
                        <div class="input-group">
                            <input type="text" class="form-control" name="search" placeholder="Cari event..." value="{{ request('search') }}">
                            <button class="btn btn-outline-secondary" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Daftar Event -->
    <div class="card">
        <div class="card-header bg-white">
            <h5 class="mb-0">Semua Event</h5>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Gambar</th>
                            <th>Judul</th>
                            <th>Tanggal</th>
                            <th>Lokasi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($events as $event)
                        <tr>
                            <td><img src="{{ asset('storage/' . $event->image) }}" alt="{{ $event->title }}" class="img-thumbnail" style="width: 100px; height: 60px; object-fit: cover;"></td>
                            <td>{{ $event->title }}</td>
                            <td>{{ \Carbon\Carbon::parse($event->date)->format('Y-m-d') }}</td>
                            <td>{{ $event->location }}</td>
                            <td>
                                <a href="{{ route('events.participants', $event->id) }}" class="btn btn-success btn-sm">
                                    <i class="fas fa-user"></i>
                                </a>
                                <button class="btn btn-sm btn-info view-event" data-bs-toggle="modal" data-bs-target="#viewEventModal" 
                                    data-id="{{ $event->id }}"
                                    data-title="{{ $event->title }}"
                                    data-description="{{ $event->description }}"
                                    data-date="{{ \Carbon\Carbon::parse($event->date)->format('F d, Y') }}"
                                    data-location="{{ $event->location }}"
                                    data-location-url="{{ $event->location_url }}"
                                    data-image="{{ asset('storage/' . $event->image) }}">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="btn btn-sm btn-warning edit-event" data-bs-toggle="modal" data-bs-target="#editEventModal"
                                    data-id="{{ $event->id }}"
                                    data-title="{{ $event->title }}"
                                    data-description="{{ $event->description }}"
                                    data-date="{{ $event->date }}"
                                    data-location="{{ $event->location }}"
                                    data-location-url="{{ $event->location_url }}"
                                    data-image="{{ asset('storage/' . $event->image) }}">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn btn-sm btn-danger delete-event" data-bs-toggle="modal" data-bs-target="#deleteEventModal"
                                    data-id="{{ $event->id }}"
                                    data-title="{{ $event->title }}">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center">Tidak ada event ditemukan</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            <!-- Paginate -->
            <div class="mt-4">
                {{ $events->withQueryString()->links() }}
            </div>
        </div>
    </div>
</div>

<!-- Modal Tambah Event -->
<div class="modal fade" id="addEventModal" tabindex="-1" aria-labelledby="addEventModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addEventModalLabel">Tambah Event Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.event.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Judul</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}" required>
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Deskripsi</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="4" required>{{ old('description') }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="date" class="form-label">Tanggal</label>
                            <input type="date" class="form-control @error('date') is-invalid @enderror" id="date" name="date" value="{{ old('date') }}" required>
                            @error('date')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="location" class="form-label">Lokasi</label>
                            <input type="text" class="form-control @error('location') is-invalid @enderror" id="location" name="location" value="{{ old('location') }}" required>
                            @error('location')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="location_url_input" class="form-label">URL Lokasi (Paste kode iframe Google Maps)</label>
                        <textarea class="form-control @error('location_url') is-invalid @enderror" id="location_url_input" rows="4" placeholder="Tempel kode iframe dari Google Maps"></textarea>
                        <input type="hidden" name="location_url" id="location_url_hidden" value="{{ old('location_url') }}">
                        @error('location_url')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Gambar Event</label>
                        <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" required>
                        <div class="form-text">Unggah gambar untuk event (ukuran disarankan: 1200x600px)</div>
                        @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan Event</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Lihat Event -->
<div class="modal fade" id="viewEventModal" tabindex="-1" aria-labelledby="viewEventModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewEventModalLabel">Detail Event</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="text-center mb-4">
                    <img id="view_image" src="" alt="Event" class="img-fluid rounded">
                </div>
                <h3 id="view_title"></h3>
                <div class="d-flex my-3">
                    <div class="me-4"><i class="far fa-calendar-alt"></i> <span id="view_date"></span></div>
                    <div><i class="fas fa-map-marker-alt"></i> <span id="view_location"></span></div>
                </div>
                <div id="view_description"></div>
                <div class="mt-3">
                    <label class="form-label">Peta Lokasi:</label>
                    <iframe id="view_location_map" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit Event -->
<div class="modal fade" id="editEventModal" tabindex="-1" aria-labelledby="editEventModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editEventModalLabel">Edit Event</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editEventForm" action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="edit_title" class="form-label">Judul</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="edit_title" name="title" required>
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="edit_description" class="form-label">Deskripsi</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" id="edit_description" name="description" rows="4" required></textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="edit_date" class="form-label">Tanggal</label>
                            <input type="date" class="form-control @error('date') is-invalid @enderror" id="edit_date" name="date" required>
                            @error('date')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="edit_location" class="form-label">Lokasi</label>
                            <input type="text" class="form-control @error('location') is-invalid @enderror" id="edit_location" name="location" required>
                            @error('location')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="edit_location_url_input" class="form-label">URL Lokasi (Paste kode iframe Google Maps)</label>
                        <textarea class="form-control @error('location_url') is-invalid @enderror" id="edit_location_url_input" rows="4" placeholder="Tempel kode iframe dari Google Maps"></textarea>
                        <input type="hidden" name="location_url" id="edit_location_url_hidden">
                        @error('location_url')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="edit_image" class="form-label">Gambar Event</label>
                        <div class="mb-2">
                            <img id="current_image" src="" alt="Gambar Saat Ini" class="img-thumbnail" style="max-height: 200px;">
                        </div>
                        <input type="file" class="form-control @error('image') is-invalid @enderror" id="edit_image" name="image">
                        <div class="form-text">Unggah gambar baru untuk menggantikan yang lama (ukuran disarankan: 1200x600px)</div>
                        @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Perbarui Event</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Hapus Event -->
<div class="modal fade" id="deleteEventModal" tabindex="-1" aria-labelledby="deleteEventModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteEventModalLabel">Konfirmasi Hapus</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Apakah Anda yakin ingin menghapus event "<strong id="delete_title"></strong>"?</p>
                <p class="text-danger">Tindakan ini tidak dapat dibatalkan.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <form id="deleteEventForm" action="" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Hapus Event</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap dan Font Awesome JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Fungsi untuk mengekstrak URL dari kode iframe
    function extractIframeSrc(iframeCode) {
        try {
            const parser = new DOMParser();
            const doc = parser.parseFromString(iframeCode, 'text/html');
            const iframe = doc.querySelector('iframe');
            if (iframe && iframe.getAttribute('src').startsWith('https://www.google.com/maps/embed?')) {
                return iframe.getAttribute('src');
            }
            return '';
        } catch (e) {
            return '';
        }
    }

    // Modal Tambah Event: Ekstrak URL saat input iframe berubah
    const locationUrlInput = document.getElementById('location_url_input');
    const locationUrlHidden = document.getElementById('location_url_hidden');
    if (locationUrlInput && locationUrlHidden) {
        locationUrlInput.addEventListener('input', function() {
            const iframeCode = this.value;
            const src = extractIframeSrc(iframeCode);
            locationUrlHidden.value = src;
            if (iframeCode && !src) {
                alert('Kode iframe tidak valid. Harap masukkan kode iframe dari Google Maps.');
            }
        });
    }

    // Modal Edit Event: Ekstrak URL saat input iframe berubah
    const editLocationUrlInput = document.getElementById('edit_location_url_input');
    const editLocationUrlHidden = document.getElementById('edit_location_url_hidden');
    if (editLocationUrlInput && editLocationUrlHidden) {
        editLocationUrlInput.addEventListener('input', function() {
            const iframeCode = this.value;
            const src = extractIframeSrc(iframeCode);
            editLocationUrlHidden.value = src;
            if (iframeCode && !src) {
                alert('Kode iframe tidak valid. Harap masukkan kode iframe dari Google Maps.');
            }
        });
    }

    // Lihat Event
    const viewEventBtns = document.querySelectorAll('.view-event');
    viewEventBtns.forEach(function(btn) {
        btn.addEventListener('click', function() {
            const title = this.getAttribute('data-title');
            const description = this.getAttribute('data-description');
            const date = this.getAttribute('data-date');
            const location = this.getAttribute('data-location');
            const locationUrl = this.getAttribute('data-location-url');
            const image = this.getAttribute('data-image');
            
            document.getElementById('view_title').textContent = title;
            document.getElementById('view_date').textContent = date;
            document.getElementById('view_location').textContent = location;
            document.getElementById('view_description').innerHTML = description;
            document.getElementById('view_image').src = image;
            document.getElementById('view_location_map').src = locationUrl || '';
        });
    });
    
    // Edit Event
    const editEventBtns = document.querySelectorAll('.edit-event');
    editEventBtns.forEach(function(btn) {
        btn.addEventListener('click', function() {
            const id = this.getAttribute('data-id');
            const title = this.getAttribute('data-title');
            const description = this.getAttribute('data-description');
            const date = this.getAttribute('data-date');
            const location = this.getAttribute('data-location');
            const locationUrl = this.getAttribute('data-location-url');
            const image = this.getAttribute('data-image');
            
            document.getElementById('editEventForm').action = `/admin/event/${id}`;
            document.getElementById('edit_title').value = title;
            document.getElementById('edit_description').value = description;
            document.getElementById('edit_date').value = date;
            document.getElementById('edit_location').value = location;
            document.getElementById('edit_location_url_input').value = locationUrl ? `<iframe src="${locationUrl}"></iframe>` : '';
            document.getElementById('edit_location_url_hidden').value = locationUrl;
            document.getElementById('current_image').src = image;
        });
    });
    
    // Hapus Event
    const deleteEventBtns = document.querySelectorAll('.delete-event');
    deleteEventBtns.forEach(function(btn) {
        btn.addEventListener('click', function() {
            const id = this.getAttribute('data-id');
            const title = this.getAttribute('data-title');
            
            document.getElementById('deleteEventForm').action = `/admin/event/${id}`;
            document.getElementById('delete_title').textContent = title;
        });
    });
});
</script>
@endsection