<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('ppdb_siswas', function (Blueprint $table) {

            if (!Schema::hasColumn('ppdb_siswas', 'agama')) {
                $table->string('agama')->nullable()->after('jenis_kelamin');
            }

            if (!Schema::hasColumn('ppdb_siswas', 'no_hp_siswa')) {
                $table->string('no_hp_siswa')->nullable()->after('alamat');
            }

            if (!Schema::hasColumn('ppdb_siswas', 'pekerjaan_ayah')) {
                $table->string('pekerjaan_ayah')->nullable()->after('nama_ayah');
            }

            if (!Schema::hasColumn('ppdb_siswas', 'pekerjaan_ibu')) {
                $table->string('pekerjaan_ibu')->nullable()->after('nama_ibu');
            }

            if (!Schema::hasColumn('ppdb_siswas', 'no_hp_wali')) {
                $table->string('no_hp_wali')->nullable()->after('pekerjaan_ibu');
            }

            if (!Schema::hasColumn('ppdb_siswas', 'tahun_lulus')) {
                $table->string('tahun_lulus')->nullable()->after('asal_sekolah');
            }

            if (!Schema::hasColumn('ppdb_siswas', 'alamat_sekolah')) {
                $table->text('alamat_sekolah')->nullable()->after('tahun_lulus');
            }

            if (!Schema::hasColumn('ppdb_siswas', 'file_kk')) {
                $table->string('file_kk')->nullable()->after('alamat_sekolah');
            }

            if (!Schema::hasColumn('ppdb_siswas', 'file_akta')) {
                $table->string('file_akta')->nullable()->after('file_kk');
            }

            if (!Schema::hasColumn('ppdb_siswas', 'file_ijazah')) {
                $table->string('file_ijazah')->nullable()->after('file_akta');
            }

            if (!Schema::hasColumn('ppdb_siswas', 'file_foto')) {
                $table->string('file_foto')->nullable()->after('file_ijazah');
            }
        });
    }

    public function down(): void
    {
        // kosongkan saja supaya aman
    }
};
