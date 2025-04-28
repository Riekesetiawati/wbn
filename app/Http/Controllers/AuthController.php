<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    public function index(){
        return view('login');
    }
    
    public function login(Request $request){
        $credentials = $request->validate([
            'email' => ['required','email'],
            'password' => ['required']
        ]);
        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            if(Auth::user()->role == 'admin'){
                return redirect()->route('admin.event.index');
            }
            return redirect()->intended('/');
        }
        return redirect('login')->with('message','email atau password salah....');
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('login');
    }

    public function register(){
        return view('regis');
    }
    
    public function postRegister(Request $request){
        // Validasi data input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|string|max:20|unique:users',
            'kelamin' => 'nullable|in:Laki-laki,Perempuan',
            'ttl' => 'nullable|date',
            'provinsi' => 'nullable|string|max:255',
            'kota' => 'nullable|string|max:255',
            'kodepos' => 'nullable|string|max:10',
            'jabatan' => 'nullable|string|max:255',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required'
        ], [
            'name.required' => 'Nama lengkap wajib diisi',
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Format email tidak valid',
            'email.unique' => 'Email sudah terdaftar',
            'phone.required' => 'Nomor telepon wajib diisi',
            'phone.unique' => 'Nomor telepon sudah terdaftar',
            'kelamin.in' => 'Jenis kelamin harus Laki-laki atau Perempuan',
            'ttl.date' => 'Format tanggal lahir tidak valid',
            'password.required' => 'Kata sandi wajib diisi',
            'password.min' => 'Kata sandi minimal 8 karakter',
            'password.confirmed' => 'Konfirmasi kata sandi tidak cocok',
            'password_confirmation.required' => 'Konfirmasi kata sandi wajib diisi'
        ]);
        
        // Buat user baru jika validasi berhasil
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'kelamin' => $request->kelamin,
            'ttl' => $request->ttl,
            'provinsi' => $request->provinsi,
            'kota' => $request->kota,
            'kodepos' => $request->kodepos,
            'jabatan' => $request->jabatan,
            'password' => Hash::make($request->password),
            'role' => 'user'
        ]);
        
        // Redirect dengan pesan sukses
        return redirect('/login')->with('success', 'Pendaftaran berhasil! Silakan login.');
    }
    
    // Method untuk menampilkan form edit profile
    public function profile()
{
    $user = Auth::user();
    return view('profile', compact('user'));
}

// Method untuk memproses update profile
public function updateProfile(Request $request)
{
    $user = Auth::user();
    
    // Validasi data input
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => [
            'required',
            'email',
            Rule::unique('users')->ignore($user->id),
        ],
        'phone' => [
            'required',
            'string',
            'max:20',
            Rule::unique('users')->ignore($user->id),
        ],
        'kelamin' => 'nullable|in:Laki-laki,Perempuan',
        'ttl' => 'nullable|date',
        'provinsi' => 'nullable|string|max:255',
        'kota' => 'nullable|string|max:255',
        'kodepos' => 'nullable|string|max:10',
        'jabatan' => 'nullable|string|max:255',
        'current_password' => 'nullable|required_with:new_password',
        'new_password' => 'nullable|min:8|confirmed',
        'new_password_confirmation' => 'nullable|required_with:new_password'
    ], [
        'name.required' => 'Nama lengkap wajib diisi',
        'email.required' => 'Email wajib diisi',
        'email.email' => 'Format email tidak valid',
        'email.unique' => 'Email sudah terdaftar',
        'phone.required' => 'Nomor telepon wajib diisi',
        'phone.unique' => 'Nomor telepon sudah terdaftar',
        'kelamin.in' => 'Jenis kelamin harus Laki-laki atau Perempuan',
        'ttl.date' => 'Format tanggal lahir tidak valid',
        'current_password.required_with' => 'Password saat ini wajib diisi jika ingin mengubah password',
        'new_password.min' => 'Password baru minimal 8 karakter',
        'new_password.confirmed' => 'Konfirmasi password baru tidak cocok',
        'new_password_confirmation.required_with' => 'Konfirmasi password baru wajib diisi'
    ]);
    
    // Jika user ingin mengubah password
    if ($request->filled('current_password')) {
        // Cek apakah password lama benar
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors([
                'current_password' => 'Password saat ini tidak valid'
            ])->withInput();
        }
        
        // Update password
        $user->password = Hash::make($request->new_password);
    }
    
    // Update data user
    $user->name = $request->name;
    $user->email = $request->email;
    $user->phone = $request->phone;
    $user->kelamin = $request->kelamin;
    $user->ttl = $request->ttl;
    $user->provinsi = $request->provinsi;
    $user->kota = $request->kota;
    $user->kodepos = $request->kodepos;
    $user->jabatan = $request->jabatan;
    $user->save();
    
    return redirect()->back()->with('success', 'Profil berhasil diperbarui!');
}
}