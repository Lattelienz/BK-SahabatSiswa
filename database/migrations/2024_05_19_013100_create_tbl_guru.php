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
        Schema::create('tbl_guru', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user');
            $table->unsignedTinyInteger('id_jurusan');
            $table->enum('jabatan', ['Guru BK', 'Guru umum', 'Guru kejuruan']);
            $table->string('no_telp')->nullable();
            $table->timestamps();

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
        Schema::dropIfExists('tbl_guru');
    }
};
