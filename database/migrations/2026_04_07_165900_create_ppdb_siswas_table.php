<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ppdb_siswas', function (Blueprint $table) {
            $table->id();

            // Relasi
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('kelas_id')->nullable()->constrained('kelas')->nullOnDelete();

            // Identitas siswa
            $table->string('nama_lengkap');
            $table->string('nisn')->nullable();
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->text('alamat')->nullable();
            $table->string('no_hp')->nullable();

            // Data sekolah asal
            $table->string('asal_sekolah')->nullable();

            // Data orang tua
            $table->string('nama_ayah')->nullable();
            $table->string('nama_ibu')->nullable();

            // Status PPDB
            $table->enum('status_ppdb', ['pending', 'diterima', 'ditolak', 'aktif'])->default('pending');
            $table->enum('status_pembayaran', ['belum_bayar', 'menunggu_verifikasi', 'lunas', 'ditolak'])->default('belum_bayar');

            // Keuangan
            $table->decimal('nominal_tagihan', 12, 2)->default(250000);

            // Pembayaran
            $table->string('bukti_pembayaran')->nullable();
            $table->timestamp('tanggal_upload_pembayaran')->nullable();

            // Catatan admin
            $table->text('catatan_admin')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ppdb_siswas');
    }
};
