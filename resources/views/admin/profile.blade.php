@extends('layouts.app')
@section('title', 'profile')

@section('content')

      
<body class="bg-light">

    <!-- Main Content Area with Padding for Fixed Header -->
    <div class="container py-5 mt-20">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-body">
                        <h2 class="card-title mb-4">Perbarui Profil</h2>
                        
                        @if(session('success'))
                            <div class="alert alert-success mt-3 mb-4">
                                {{ session('success') }}
                            </div>
                        @endif
                        
                        <form action="{{ route('profile.update') }}" method="POST" id="profileForm">
                            @csrf
                            @method('PUT')
                            
                            <div class="mb-3">
                                <label for="name" class="form-label fw-bold">Nama</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                       id="name" name="name" value="{{ old('name', $user->name) }}" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold">Jenis Kelamin</label>
                                <div class="d-flex gap-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="kelamin" 
                                               id="laki" value="Laki-laki" {{ (old('kelamin', $user->kelamin) == 'Laki-laki') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="laki">Laki-laki</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="kelamin" 
                                               id="perempuan" value="Perempuan" {{ (old('kelamin', $user->kelamin) == 'Perempuan') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="perempuan">Perempuan</label>
                                    </div>
                                </div>
                                @error('kelamin')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="ttl" class="form-label fw-bold">Tanggal Lahir</label>
                                <input type="date" class="form-control @error('ttl') is-invalid @enderror" 
                                       id="ttl" name="ttl" value="{{ old('ttl', $user->ttl) }}">
                                @error('ttl')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label fw-bold">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                       id="email" name="email" value="{{ old('email', $user->email) }}" required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="phone" class="form-label fw-bold">Nomor HP</label>
                                <input type="tel" class="form-control @error('phone') is-invalid @enderror" 
                                       id="phone" name="phone" value="{{ old('phone', $user->phone) }}" required>
                                @error('phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="provinsi" class="form-label fw-bold">Provinsi</label>
                                <input type="text" class="form-control @error('provinsi') is-invalid @enderror" 
                                       id="provinsi" name="provinsi" value="{{ old('provinsi', $user->provinsi) }}">
                                @error('provinsi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="kota" class="form-label fw-bold">Kota</label>
                                <input type="text" class="form-control @error('kota') is-invalid @enderror" 
                                       id="kota" name="kota" value="{{ old('kota', $user->kota) }}">
                                @error('kota')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="kodepos" class="form-label fw-bold">Kode Pos</label>
                                <input type="text" class="form-control @error('kodepos') is-invalid @enderror" 
                                       id="kodepos" name="kodepos" value="{{ old('kodepos', $user->kodepos) }}">
                                @error('kodepos')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="jabatan" class="form-label fw-bold">Jabatan</label>
                                <input type="text" class="form-control @error('jabatan') is-invalid @enderror" 
                                       id="jabatan" name="jabatan" value="{{ old('jabatan', $user->jabatan) }}">
                                @error('jabatan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <hr class="my-4">
                            <h5 class="mb-3">Ubah Kata Sandi</h5>
                            <div class="mb-3">
                                <label for="current_password" class="form-label">Kata Sandi Saat Ini</label>
                                <input type="password" class="form-control @error('current_password') is-invalid @enderror" 
                                       id="current_password" name="current_password">
                                @error('current_password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="new_password" class="form-label">Kata Sandi Baru</label>
                                <input type="password" class="form-control @error('new_password') is-invalid @enderror" 
                                       id="new_password" name="new_password">
                                <div class="form-text">Kosongkan jika tidak ingin mengubah kata sandi</div>
                                @error('new_password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="new_password_confirmation" class="form-label">Konfirmasi Kata Sandi Baru</label>
                                <input type="password" class="form-control @error('new_password_confirmation') is-invalid @enderror" 
                                       id="new_password_confirmation" name="new_password_confirmation">
                                @error('new_password_confirmation')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-flex justify-content-end gap-2 mt-4">
                                <a href="{{ url('/') }}" class="btn btn-outline-secondary">Batal</a>
                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Client-side validation script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('profileForm');
            
            form.addEventListener('submit', function(event) {
                let isValid = true;
                
                // Basic validation for required fields
                const requiredFields = ['name', 'email', 'phone'];
                requiredFields.forEach(field => {
                    const input = document.getElementById(field);
                    if (!input.value.trim()) {
                        input.classList.add('is-invalid');
                        isValid = false;
                    } else {
                        input.classList.remove('is-invalid');
                    }
                });
                
                // Email validation
                const emailInput = document.getElementById('email');
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (emailInput.value && !emailRegex.test(emailInput.value)) {
                    emailInput.classList.add('is-invalid');
                    isValid = false;
                }
                
                // Password confirmation validation
                const newPassword = document.getElementById('new_password');
                const confirmPassword = document.getElementById('new_password_confirmation');
                const currentPassword = document.getElementById('current_password');
                
                if (newPassword.value && newPassword.value.length < 8) {
                    newPassword.classList.add('is-invalid');
                    isValid = false;
                }
                
                if (newPassword.value && !currentPassword.value) {
                    currentPassword.classList.add('is-invalid');
                    isValid = false;
                }
                
                if (newPassword.value && newPassword.value !== confirmPassword.value) {
                    confirmPassword.classList.add('is-invalid');
                    isValid = false;
                }
                
                if (!isValid) {
                    event.preventDefault();
                }
            });
        });
    </script>
</body>

@endsection