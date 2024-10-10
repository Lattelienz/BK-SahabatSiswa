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
        Schema::create('tbl_siswa', function (Blueprint $table) {
            $table->biginteger('nis')->primary();
            $table->unsignedBigInteger('id_user');
            $table->unsignedTinyInteger('id_jurusan');
            $table->enum('kelas',[
                'X', 'X A', 'X B',
                'XI', 'XI A', 'XI B',
                'XII', 'XII A', 'XII B',
                'XIII'
            ]);
            $table->string('gaya_belajar')->nullable();
            $table->timestamps();
           
            // foreign key
            $table->foreign('id_user')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
            $table->foreign('id_jurusan')
                    ->references('id_jurusan')
                    ->on('tbl_jurusan')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_siswa');
    }
};
