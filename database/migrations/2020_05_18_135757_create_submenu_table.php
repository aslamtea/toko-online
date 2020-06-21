<?php

use App\Admin\Menu;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubmenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('submenu', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('menu_id');
            $table->string('name');
            $table->string('icon');
            $table->timestamps();

            $table->foreign('menu_id')->references('id')->on('menu')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::create('menu_url', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('submenu_id');
            $table->string('name');
            $table->string('url');
            $table->timestamps();

            $table->foreign('submenu_id')->references('id')->on('submenu')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('submenu');
    }
}
