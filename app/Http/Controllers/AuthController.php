<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{

    public function showRegistrationForm()
    {
        $studyGroups = \App\Models\StudyGroup::all();
        return view('auth.register', compact('studyGroups'));
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:murid,guru',
            'study_groups_id' => 'nullable|exists:study_groups,id',
        ]);

        try {
            // Gunakan variabel agar bisa dicek jika gagal
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $request->role,
                'is_sarpras' => false,
                'is_osis' => false,
                'study_groups_id' => $request->study_groups_id,
            ]);

            if ($user) {
                // Redirect ke login dengan pesan sukses
                return redirect()->route('login')->with('success', 'Registrasi berhasil! Silakan login.');
            }

        } catch (\Exception $e) {
            // Log error untuk debug (cek storage/logs/laravel.log)

            logger("Register Error: " . $e->getMessage());

            return back()->withInput()->withErrors([
                'error' => 'Gagal mendaftar: ' . $e->getMessage()
            ]);
        }
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => ['required', 'email'], // Pakai email, bukan name
            'password' => ['required', 'string'],
        ], [
            'email.required'    => 'Emailnya diisi dulu ya!',
            'email.email'       => 'Format emailnya salah tuh.',
            'password.required' => 'Password jangan dikosongin.',
        ]);

        // proses autentikasi
        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();
            return redirect()->intended('/')->with('success', 'Hore! Berhasil login. Selamat datang kembali!');
        }

        // Jika gagal (Email atau Password salah)
        return back()->withErrors([
            'email' => 'Duh, email atau password kamu nggak cocok nih di data kita.',
        ])->withInput($request->only('email'));
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'Anda telah berhasil keluar.');
    }
}
