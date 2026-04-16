<?php

namespace Database\Seeders;

use App\Models\Kelas;
use Illuminate\Database\Seeder;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kelasList = [
            ['nama_kelas' => '10-A', 'tingkat' => '10', 'jurusan' => 'Umum', 'kapasitas' => 36],
            ['nama_kelas' => '10-B', 'tingkat' => '10', 'jurusan' => 'Umum', 'kapasitas' => 36],
            ['nama_kelas' => '11-IPA-1', 'tingkat' => '11', 'jurusan' => 'IPA', 'kapasitas' => 36],
            ['nama_kelas' => '11-IPS-1', 'tingkat' => '11', 'jurusan' => 'IPS', 'kapasitas' => 36],
            ['nama_kelas' => '12-IPA-1', 'tingkat' => '12', 'jurusan' => 'IPA', 'kapasitas' => 36],
        ];

        foreach ($kelasList as $kelas) {
            Kelas::updateOrCreate(
                ['nama_kelas' => $kelas['nama_kelas']],
                $kelas
            );
        }
    }
}
