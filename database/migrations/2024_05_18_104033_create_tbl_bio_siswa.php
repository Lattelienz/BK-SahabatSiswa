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
        Schema::create('tbl_bio_siswa', function (Blueprint $table) {
           
            // kolom data pribadi siswa
            $table->biginteger('nis')->primary();
            $table->string('nama_panggilan');
            $table->string('agama');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('no_telp');
            $table->string('asal_smp');
            $table->integer('nilai_ujian_akhir');
            $table->string('alamat_sekarang');
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
        Schema::dropIfExists('tbl_biosiswa');
    }
};
