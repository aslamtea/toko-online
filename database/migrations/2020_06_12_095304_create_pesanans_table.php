<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesanan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pembeli_id');
            $table->string('nama_lengkap');
            $table->integer('no_telepon');
            $table->text('alamat');
            $table->string('kurir');
            $table->integer('jumlah_harga');
            $table->date('tanggal');
            $table->integer('status');
            $table->text('keterangan')->nullable();
            $table->timestamps();
            $table->foreign('pembeli_id')->references('id')->on('pembeli')->onDelete('cascade')->onUpdate('cascade');
        });
        Schema::create('pesanan_detail', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('barang_id');
            $table->unsignedBigInteger('pesanan_id');
            $table->integer('jumlah');
            $table->integer('ongkir');
            $table->integer('total_beret');
            $table->integer('jumlah_harga');
            $table->timestamps();
            $table->foreign('barang_id')->references('id')->on('barang')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('pesanan_id')->references('id')->on('pesanan')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pesanan');
        Schema::dropIfExists('pesanan_detail');
    }
}
