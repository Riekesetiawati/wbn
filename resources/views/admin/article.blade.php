@extends('layouts.app')
@section('title', 'Article Management')
@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2><i class="fas fa-newspaper"></i> Article Management</h2>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addArticleModal">
            <i class="fas fa-plus"></i> Add New Article
        </button>
    </div>
    
    <!-- Article Search and Filter -->
    <div class="card mb-4">
        <div class="card-body">
            <div class="row">
                <div class="col-md-8">
                    <form action="{{ route('admin.article.index') }}" method="GET">
                        <div class="input-group">
                            <input type="text" class="form-control" name="search" placeholder="Search articles..." value="{{ request('search') }}">
                            <button class="btn btn-outline-secondary" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Articles List -->
    <div class="card">
        <div class="card-header bg-white">
            <h5 class="mb-0">All Articles</h5>
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
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($articles as $article)
                        <tr>
                            <td><img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}" class="img-thumbnail" style="width: 100px; height: 60px; object-fit: cover;"></td>
                            <td>{{ $article->title }}</td>
                            <td>{{ Str::limit($article->description, 100) }}</td>
                            <td>
                                <button class="btn btn-sm btn-info view-article" data-bs-toggle="modal" data-bs-target="#viewArticleModal" 
                                    data-id="{{ $article->id }}"
                                    data-title="{{ $article->title }}"
                                    data-description="{{ $article->description }}"
                                    data-image="{{ asset('storage/' . $article->image) }}">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="btn btn-sm btn-warning edit-article" data-bs-toggle="modal" data-bs-target="#editArticleModal"
                                    data-id="{{ $article->id }}"
                                    data-title="{{ $article->title }}"
                                    data-description="{{ $article->description }}"
                                    data-image="{{ asset('storage/' . $article->image) }}">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn btn-sm btn-danger delete-article" data-bs-toggle="modal" data-bs-target="#deleteArticleModal"
                                    data-id="{{ $article->id }}"
                                    data-title="{{ $article->title }}">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center">No articles found</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            <!-- Pagination -->
            <div class="mt-4">
                {{ $articles->withQueryString()->links() }}
            </div>
        </div>
    </div>
</div>

<!-- Add Article Modal -->
<div class="modal fade" id="addArticleModal" tabindex="-1" aria-labelledby="addArticleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addArticleModalLabel">Add New Article</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.article.store') }}" method="POST" enctype="multipart/form-data">
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
                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="6" required>{{ old('description') }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Article Image</label>
                        <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" required>
                        <div class="form-text">Upload an image for the article (recommended size: 1200x600px)</div>
                        @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save Article</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- View Article Modal -->
<div class="modal fade" id="viewArticleModal" tabindex="-1" aria-labelledby="viewArticleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewArticleModalLabel">Article Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="text-center mb-4">
                    <img id="view_image" src="" alt="Article" class="img-fluid rounded">
                </div>
                <h3 id="view_title"></h3>
                <div id="view_description"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Edit Article Modal -->
<div class="modal fade" id="editArticleModal" tabindex="-1" aria-labelledby="editArticleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editArticleModalLabel">Edit Article</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editArticleForm" action="" method="POST" enctype="multipart/form-data">
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
                        <textarea class="form-control @error('description') is-invalid @enderror" id="edit_description" name="description" rows="6" required></textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="edit_image" class="form-label">Article Image</label>
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
                        <button type="submit" class="btn btn-primary">Update Article</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Delete Article Modal -->
<div class="modal fade" id="deleteArticleModal" tabindex="-1" aria-labelledby="deleteArticleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteArticleModalLabel">Confirm Delete</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete the article "<strong id="delete_title"></strong>"?</p>
                <p class="text-danger">This action cannot be undone.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <form id="deleteArticleForm" action="" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete Article</button>
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
    // View Article
    const viewArticleBtns = document.querySelectorAll('.view-article');
    viewArticleBtns.forEach(function(btn) {
        btn.addEventListener('click', function() {
            const title = this.getAttribute('data-title');
            const description = this.getAttribute('data-description');
            const image = this.getAttribute('data-image');
            
            document.getElementById('view_title').textContent = title;
            document.getElementById('view_description').innerHTML = description;
            document.getElementById('view_image').src = image;
        });
    });
    
    // Edit Article
    const editArticleBtns = document.querySelectorAll('.edit-article');
    editArticleBtns.forEach(function(btn) {
        btn.addEventListener('click', function() {
            const id = this.getAttribute('data-id');
            const title = this.getAttribute('data-title');
            const description = this.getAttribute('data-description');
            const image = this.getAttribute('data-image');
            
            document.getElementById('editArticleForm').action = `/admin/article/${id}`;
            document.getElementById('edit_title').value = title;
            document.getElementById('edit_description').value = description;
            document.getElementById('current_image').src = image;
        });
    });
    
    // Delete Article
    const deleteArticleBtns = document.querySelectorAll('.delete-article');
    deleteArticleBtns.forEach(function(btn) {
        btn.addEventListener('click', function() {
            const id = this.getAttribute('data-id');
            const title = this.getAttribute('data-title');
            
            document.getElementById('deleteArticleForm').action = `/admin/article/${id}`;
            document.getElementById('delete_title').textContent = title;
        });
    });
});
</script>
@endsection