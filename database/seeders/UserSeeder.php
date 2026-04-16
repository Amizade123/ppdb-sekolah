<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@sekolah.com'],
            [
                'name' => 'Admin Sekolah',
                'password' => bcrypt('password'),
                'role' => 'admin',
            ]
        );

        User::updateOrCreate(
            ['email' => 'guru@sekolah.com'],
            [
                'name' => 'Guru Sekolah',
                'password' => bcrypt('password'),
                'role' => 'guru',
            ]
        );

        User::updateOrCreate(
            ['email' => 'kepala@sekolah.com'],
            [
                'name' => 'Kepala Sekolah',
                'password' => bcrypt('password'),
                'role' => 'kepala_sekolah',
            ]
        );

        User::updateOrCreate(
            ['email' => 'siswa@sekolah.com'],
            [
                'name' => 'Siswa Test',
                'password' => bcrypt('password'),
                'role' => 'siswa',
            ]
        );
    }
}
