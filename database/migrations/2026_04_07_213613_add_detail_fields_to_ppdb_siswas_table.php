<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('ppdb_siswas', function (Blueprint $table) {
            $table->string('agama')->nullable()->after('jenis_kelamin');
            $table->string('no_hp_siswa')->nullable()->after('alamat');

            $table->string('pekerjaan_ayah')->nullable()->after('nama_ayah');
            $table->string('pekerjaan_ibu')->nullable()->after('nama_ibu');
            $table->string('no_hp_wali')->nullable()->after('pekerjaan_ibu');

            $table->string('tahun_lulus')->nullable()->after('asal_sekolah');
            $table->text('alamat_sekolah')->nullable()->after('tahun_lulus');

            $table->string('file_kk')->nullable()->after('alamat_sekolah');
            $table->string('file_akta')->nullable()->after('file_kk');
            $table->string('file_ijazah')->nullable()->after('file_akta');
            $table->string('file_foto')->nullable()->after('file_ijazah');
        });
    }

    public function down(): void
    {
        Schema::table('ppdb_siswas', function (Blueprint $table) {
            $table->dropColumn([
                'agama',
                'no_hp_siswa',
                'pekerjaan_ayah',
                'pekerjaan_ibu',
                'no_hp_wali',
                'tahun_lulus',
                'alamat_sekolah',
                'file_kk',
                'file_akta',
                'file_ijazah',
                'file_foto',
            ]);
        });
    }
};