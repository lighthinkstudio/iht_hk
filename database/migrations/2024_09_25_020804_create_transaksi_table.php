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
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('produk_id');
            $table->string('nama_kategori', 50);
            $table->string('nama_produk', 255);
            $table->bigInteger('harga')->default(0);
            $table->timestamp('tanggal_transaksi');
            $table->enum('status', ['menunggu', 'sukses', 'gagal'])->default('menunggu');
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi');
    }
};
