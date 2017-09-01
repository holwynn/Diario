<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            // We want nullable properties so we can let writers create drafts of articles
            // for later edition. They should at least have a title tho.
            $table->increments('id');
            $table->string('title');
            $table->string('slug')->nullable();
            $table->string('tags')->nullable();
            $table->text('content')->nullable();
            $table->string('status')->default('draft');
            $table->string('image')->nullable();
            $table->boolean('show_image')->default(false);

            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories');

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
