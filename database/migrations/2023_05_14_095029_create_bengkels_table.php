<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bengkel', function (Blueprint $table) {
            $table->integer('id');
            $table->integer('kode_barang');
            $table->string('nama_barang');
            $table->string('deskripsi');
            $table->integer('stok_barang');
            $table->integer('harga_barang');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bengkel');
    }
};
