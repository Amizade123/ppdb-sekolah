<?php

namespace Database\Seeders;

use App\Models\GuruProfile;
use App\Models\MataPelajaran;
use App\Models\User;
use Illuminate\Database\Seeder;

class AkademikSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MataPelajaran::updateOrCreate(
            ['nama_mapel' => 'Matematika'],
            ['kode_mapel' => 'MTK']
        );

        MataPelajaran::updateOrCreate(
            ['nama_mapel' => 'Bahasa Indonesia'],
            ['kode_mapel' => 'BIN']
        );

        MataPelajaran::updateOrCreate(
            ['nama_mapel' => 'IPA'],
            ['kode_mapel' => 'IPA']
        );

        MataPelajaran::updateOrCreate(
            ['nama_mapel' => 'IPS'],
            ['kode_mapel' => 'IPS']
        );

        $guruUser = User::where('email', 'guru@sekolah.com')->first();

        if ($guruUser) {
            GuruProfile::updateOrCreate(
                ['user_id' => $guruUser->id],
                [
                    'nip' => '1988123456',
                    'nama_guru' => 'Guru Sekolah',
                ]
            );
        }
    }
}
