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
        Schema::create('tbl_bio_ortu', function (Blueprint $table) {
            
            // kolom data orangtua siswa
            $table->bigInteger('nis')->primary();
            $table->string('nama_ayah');
            $table->string('nama_ibu');
            $table->string('pendidikan_ayah');
            $table->string('pendidikan_ibu');
            $table->string('pekerjaan_ayah');
            $table->string('pekerjaan_ibu');
            $table->bigInteger('penghasilan_ortu');         
            $table->enum('penghasilan_ortu_per', ['hari', 'minggu', 'bulan']);         
            $table->string('alamat_ortu');
            $table->string('no_telp');
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
        Schema::dropIfExists('tbl_bio_ortu');
    }
};
