<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFrontblocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('frontblocks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('articles');
            $table->integer('rows')->required();
            $table->string('columns')->required();
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
        Schema::dropIfExists('frontblocks');
    }
}
