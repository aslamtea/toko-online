<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembeliDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembeli_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pembeli_id');
            $table->string('nama_lengkap');
            $table->string('jenis_kelamin');
            $table->integer('no_hp');
            $table->text('alamat');
            $table->timestamps();

            $table->foreign('pembeli_id')->references('id')->on('pembeli')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pembeli_details');
    }
}
