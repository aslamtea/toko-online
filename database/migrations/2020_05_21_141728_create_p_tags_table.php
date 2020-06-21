<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('p_tags', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->timestamps();
        });
        Schema::create('posts_p_tags', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('posts_id');
            $table->unsignedBigInteger('p_tags_id');
            $table->timestamps();

            $table->foreign('posts_id')->references('id')->on('posts')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('p_tags_id')->references('id')->on('p_tags')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('p_tags');
        Schema::dropIfExists('posts_p_tags');
    }
}
