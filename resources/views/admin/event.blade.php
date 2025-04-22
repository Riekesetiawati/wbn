@extends('layouts.app')
@section('title', 'Event Management')
@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2><i class="fas fa-calendar-alt"></i> Event Management</h2>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addEventModal">
            <i class="fas fa-plus"></i> Add New Event
        </button>
    </div>
    
    <!-- Event Search and Filter -->
    <div class="card mb-4">
        <div class="card-body">
            <div class="row">
                <div class="col-md-8">
                    <form action="{{ route('admin.event.index') }}" method="GET">
                        <div class="input-group">
                            <input type="text" class="form-control" name="search" placeholder="Search events..." value="{{ request('search') }}">
                            <button class="btn btn-outline-secondary" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Events List -->
    <div class="card">
        <div class="card-header bg-white">
            <h5 class="mb-0">All Events</h5>
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
                            <th>Image</th>
                            <th>Title</th>
                            <th>Date</th>
                            <th>Location</th>
                            <th>Actions</th>
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
                                <button class="btn btn-sm btn-info view-event" data-bs-toggle="modal" data-bs-target="#viewEventModal" 
                                    data-id="{{ $event->id }}"
                                    data-title="{{ $event->title }}"
                                    data-description="{{ $event->description }}"
                                    data-date="{{ \Carbon\Carbon::parse($event->date)->format('F d, Y') }}"
                                    data-location="{{ $event->location }}"
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
                            <td colspan="5" class="text-center">No events found</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            <!-- Pagination -->
            <div class="mt-4">
                {{ $events->withQueryString()->links() }}
            </div>
        </div>
    </div>
</div>

<!-- Add Event Modal -->
<div class="modal fade" id="addEventModal" tabindex="-1" aria-labelledby="addEventModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addEventModalLabel">Add New Event</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.event.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}" required>
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="4" required>{{ old('description') }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="date" class="form-label">Date</label>
                            <input type="date" class="form-control @error('date') is-invalid @enderror" id="date" name="date" value="{{ old('date') }}" required>
                            @error('date')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="location" class="form-label">Location</label>
                            <input type="text" class="form-control @error('location') is-invalid @enderror" id="location" name="location" value="{{ old('location') }}" required>
                            @error('location')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="location_url" class="form-label">Location URL</label>
                        <input type="url" class="form-control @error('location_url') is-invalid @enderror" id="location_url" name="location_url" value="{{ old('location_url') }}" required>
                        @error('location_url')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Event Image</label>
                        <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" required>
                        <div class="form-text">Upload an image for the event (recommended size: 1200x600px)</div>
                        @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save Event</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- View Event Modal -->
<div class="modal fade" id="viewEventModal" tabindex="-1" aria-labelledby="viewEventModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewEventModalLabel">Event Details</h5>
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
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Edit Event Modal -->
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
                        <label for="edit_title" class="form-label">Title</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="edit_title" name="title" required>
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="edit_description" class="form-label">Description</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" id="edit_description" name="description" rows="4" required></textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="edit_date" class="form-label">Date</label>
                            <input type="date" class="form-control @error('date') is-invalid @enderror" id="edit_date" name="date" required>
                            @error('date')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="edit_location" class="form-label">Location</label>
                            <input type="text" class="form-control @error('location') is-invalid @enderror" id="edit_location" name="location" required>
                            @error('location')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="edit_location_url" class="form-label">Location URL</label>
                        <input type="url" class="form-control @error('location_url') is-invalid @enderror" id="edit_location_url" name="location_url" required>
                        @error('location_url')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="edit_image" class="form-label">Event Image</label>
                        <div class="mb-2">
                            <img id="current_image" src="" alt="Current Image" class="img-thumbnail" style="max-height: 200px;">
                        </div>
                        <input type="file" class="form-control @error('image') is-invalid @enderror" id="edit_image" name="image">
                        <div class="form-text">Upload a new image to replace the current one (recommended size: 1200x600px)</div>
                        @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Update Event</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Delete Event Modal -->
<div class="modal fade" id="deleteEventModal" tabindex="-1" aria-labelledby="deleteEventModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteEventModalLabel">Confirm Delete</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete the event "<strong id="delete_title"></strong>"?</p>
                <p class="text-danger">This action cannot be undone.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <form id="deleteEventForm" action="" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete Event</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap and Font Awesome JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // View Event
    const viewEventBtns = document.querySelectorAll('.view-event');
    viewEventBtns.forEach(function(btn) {
        btn.addEventListener('click', function() {
            const title = this.getAttribute('data-title');
            const description = this.getAttribute('data-description');
            const date = this.getAttribute('data-date');
            const location = this.getAttribute('data-location');
            const image = this.getAttribute('data-image');
            
            document.getElementById('view_title').textContent = title;
            document.getElementById('view_date').textContent = date;
            document.getElementById('view_location').textContent = location;
            document.getElementById('view_description').innerHTML = description;
            document.getElementById('view_image').src = image;
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
            
            // Perbaikan: Setel URL dengan ID yang benar
            document.getElementById('editEventForm').action = `/admin/event/${id}`;
            document.getElementById('edit_title').value = title;
            document.getElementById('edit_description').value = description;
            document.getElementById('edit_date').value = date;
            document.getElementById('edit_location').value = location;
            document.getElementById('edit_location_url').value = locationUrl;
            document.getElementById('current_image').src = image;
        });
    });
    
    // Delete Event
    const deleteEventBtns = document.querySelectorAll('.delete-event');
    deleteEventBtns.forEach(function(btn) {
        btn.addEventListener('click', function() {
            const id = this.getAttribute('data-id');
            const title = this.getAttribute('data-title');
            
            // Perbaikan: Setel URL dengan ID yang benar
            document.getElementById('deleteEventForm').action = `/admin/event/${id}`;
            document.getElementById('delete_title').textContent = title;
        });
    });
});
</script>
@endsection