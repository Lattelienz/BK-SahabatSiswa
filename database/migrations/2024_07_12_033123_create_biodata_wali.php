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
        Schema::create('tbl_biodata_wali', function (Blueprint $table) {

            // kolom data orangtua siswa
            $table->bigInteger('nis')->primary();
            $table->string('nama_wali');
            $table->string('pekerjaan_wali');
            $table->string('alamat_wali');
            $table->integer('no_telp_wali');         
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
        Schema::dropIfExists('biodata_wali');
    }
};
