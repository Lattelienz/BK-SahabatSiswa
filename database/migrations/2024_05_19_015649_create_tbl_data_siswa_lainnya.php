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
        Schema::create('tbl_data_siswa_lainnya', function (Blueprint $table) {
            
            // kolom data siswa lainnya
            $table->bigInteger('nis')->primary();
            $table->date('tanggal_diterima');            
            $table->integer('anak_ke');            
            $table->integer('dari_jumlah_saudara');            
            $table->integer('jumlah_orang_yg_serumah');            
            $table->integer('jumlah_tanggungan_ortu');            
            $table->string('kesekolah_memakai');            
            $table->enum('tempat_tinggal', [
                'milik_sendiri', 
                'sewa', 
                'milik_keluarga', 
                'rumah_dinas', 
                'lainnya'
            ]);            
            $table->enum('penerangan', [
                'listrik', 
                'lampu_tembok', 
                'lilin', 
                'lainnya',
            ]);            
            $table->enum('hp', ['punya', 'tidak']);            
            $table->enum('laptop', ['punya', 'tidak']);            
            $table->enum('pjj_memakai', [
                'wifi_sendiri',
                'wifi_tetangga',
                'kuota',
                'lainnya'
            ]);            
            $table->string('pelajaran_yg_tdk_disuka');            
            $table->string('pelajaran_yg_disuka');            
            $table->string('cita-cita_stlh_tamat');            
            $table->string('hobby');            
            $table->string('penyakit_yg_menggangu_belajar');            
            $table->string('bhs_sehari-hari');            
            $table->string('suku');            
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
        Schema::dropIfExists('tbl_data_siswa_lainnya');
    }
};
