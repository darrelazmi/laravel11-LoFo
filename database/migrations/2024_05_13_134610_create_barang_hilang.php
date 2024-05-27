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
        Schema::create('barang_hilangs', function (Blueprint $table) {
            $table->id();
            $table->string('nama_barang');
            $table->string('foto_barang');
            $table->text('deskripsi');
            $table->string('lokasi');
            $table->string('phone');
            $table->timestamps();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barang_hilangs');
    }
};
