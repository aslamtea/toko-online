<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barang', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->string('gambar');
            $table->text('isi');
            $table->unsignedBigInteger('toko_id');
            $table->unsignedBigInteger('kategori_id');
            $table->unsignedBigInteger('merek_id');
            $table->integer('stok');
            $table->integer('harga');
            $table->timestamps();

            $table->foreign('toko_id')->references('id')->on('toko')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('kategori_id')->references('id')->on('kategori')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('merek_id')->references('id')->on('merek')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('barang');
    }
}
