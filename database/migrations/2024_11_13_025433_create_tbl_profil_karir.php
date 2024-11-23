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
        Schema::create('tbl_profil_karir', function (Blueprint $table) {
            $table->bigInteger('nis')->primary();
            $table->string('sd');
            $table->string('smp');
            $table->string('smk');
            $table->string('minat_karir');
            $table->string('hobi');
            $table->string('keterampilan_sudah');
            $table->string('keterampilan_kembangan');
            $table->string('pengalaman_relawan');
            $table->string('pengalaman_kerja');
            $table->string('tujuan_pendek');
            $table->string('tujuan_panjang');
            $table->string('rencana_kursus');
            $table->string('rencana_sertifikasi');
            $table->string('networking');
            $table->string('nama_referensi');
            $table->string('prestasi');
            $table->timestamps();

            $table->foreign('nis')
                    ->references('nis')
                    ->on('tbl_siswa')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_profil_karir');
    }
};
