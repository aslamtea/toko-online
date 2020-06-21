<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKeranjangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keranjang', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pembeli_id');
            $table->integer('jumlah_harga');
            $table->date('tanggal');
            $table->integer('status');
            $table->timestamps();
            $table->foreign('pembeli_id')->references('id')->on('pembeli')->onDelete('cascade')->onUpdate('cascade');
        });
        Schema::create('keranjang_detail', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('barang_id');
            $table->unsignedBigInteger('keranjang_id');
            $table->integer('jumlah');
            $table->integer('jumlah_harga');
            $table->timestamps();
            $table->foreign('barang_id')->references('id')->on('barang')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('keranjang_id')->references('id')->on('keranjang')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('keranjang');
        Schema::dropIfExists('keranjang_detail');
    }
}
