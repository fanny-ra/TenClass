<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // ADMIN SARPRAS
        User::create([
            'name' => 'Nurtovingah',
            'email' => 'sarpras@sekolah.com',
            'email_verified_at' => now(), 
            'password' => Hash::make('sarpras123'),
            'role' => 'guru',
            'is_sarpras' => true,
            'is_osis' => false,
            'study_groups_id' => null,
            'remember_token' => Str::random(10),
        ]);

        // Guru biasa atau Pembina Eskul
        User::create([
            'name' => 'Mujahid',
            'email' => 'mujahid.guru@sekolah.com',
            'email_verified_at' => now(),
            'password' => Hash::make('guru123'),
            'role' => 'guru',
            'is_sarpras' => false,
            'is_osis' => false,
            'study_groups_id' => null,
            'remember_token' => Str::random(10),
        ]);

        // OSIS (Role Murid, is_osis TRUE)
        User::create([
            'name' => 'Husna',
            'email' => 'husna.osis@sekolah.com',
            'email_verified_at' => now(),
            'password' => Hash::make('osis123'),
            'role' => 'murid',
            'is_sarpras' => false,
            'is_osis' => true,
            'study_groups_id' => null,
            'remember_token' => Str::random(10),
        ]);

        // Murid Biasa (Peminjam)
        User::create([
            'name' => 'Apip (Murid Biasa)',
            'email' => 'apip@sekolah.com',
            'email_verified_at' => now(),
            'password' => Hash::make('murid123'),
            'role' => 'murid',
            'is_sarpras' => false,
            'is_osis' => false,
            'study_groups_id' => null,
            'remember_token' => Str::random(10),
        ]);
    }
}
