<?php

namespace Database\Seeders;

use App\Models\Kelas;
use App\Models\PpdbSiswa;
use App\Models\User;
use Illuminate\Database\Seeder;

class PpdbSiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::where('email', 'siswa@sekolah.com')->first();
        $kelas = Kelas::where('nama_kelas', '10-A')->first();

        if ($user) {
            PpdbSiswa::updateOrCreate(
                ['user_id' => $user->id],
                [
                    'kelas_id' => $kelas?->id,
                    'nama_lengkap' => 'Siswa Test',
                    'nisn' => '1234567890',
                    'jenis_kelamin' => 'L',
                    'tempat_lahir' => 'Bandung',
                    'tanggal_lahir' => '2010-01-10',
                    'alamat' => 'Jl. Contoh Alamat No. 1',
                    'asal_sekolah' => 'SMP Contoh',
                    'nama_ayah' => 'Bapak Test',
                    'nama_ibu' => 'Ibu Test',
                    'no_hp' => '081234567890',
                    'status_ppdb' => 'aktif',
                    'status_pembayaran' => 'lunas',
                    'nominal_tagihan' => 500000,
                    'catatan_admin' => 'Data dummy untuk testing',
                ]
            );
        }
    }
}
