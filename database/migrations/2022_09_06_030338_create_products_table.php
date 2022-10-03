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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('nama_barang');
            $table->longText('image')->nullable();
            $table->longText('image_p')->nullable();
            $table->integer('harga');
            $table->integer('berat');
            $table->integer('ukuran');
            $table->string('jenis_barang')->nullable();
            $table->string('gender')->nullable();
            $table->longText('deskripsi')->nullable();
            $table->integer('stock_barang')->nullable();
            $table->integer('like')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
