<?php

namespace App\Http\Controllers;

use App\Models\StudyGroup;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::with('studyGroup')->latest()->get();

        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $studyGroups = StudyGroup::all();

        return view('users.create', compact('studyGroups'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $user->load('studyGroup');

        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $studyGroups = StudyGroup::all();

        return view('users.edit', compact('user', 'studyGroups'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }

    public function profileEdit()
    {
        // Ambil data user yang lagi login
        $user = Auth::user();
        return view('profile.edit', compact('user'));
}

    public function profileUpdate(Request $request)
    {
        $user = Auth::user();

        // Cek ada perubahan data atau ngga
        $isNoChanges = $request->name === $user->name &&
                    $request->email === $user->email &&
                    empty($request->password);

        if ($isNoChanges) {
            return back()->with('warning', 'Tidak ada data yang diubah.');
        }

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $user->id],
            'password' => ['nullable', 'confirmed', 'min:8'],
        ]);

        // Update
        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return back()->with('success', 'Profil kamu berhasil diperbarui!');
    }
}
