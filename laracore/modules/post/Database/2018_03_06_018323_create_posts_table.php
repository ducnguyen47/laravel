<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('description')->nullable();
            $table->longText('content')->nullable();
            $table->unsignedInteger('admin_id')->index();
            $table->foreign('admin_id')->on('admins')->references('id')
                ->onDelete('cascade');
            $table->string('featured_image')->nullable();
            $table->boolean('published')->default(false);
            $table->integer('pos')->nullable();
            $table->timestamps();
        });
        
        Schema::create('post_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('description')->nullable();
            $table->integer('parent_id')->nullable();
            $table->string('featured_image')->nullable();
            $table->boolean('published')->default(false);
            $table->integer('pos')->nullable();
            $table->timestamps();
        });

        Schema::create('posts_categories', function (Blueprint $table) {
            $table->bigInteger('post_id')->index();
            $table->foreign('post_id')->on('posts')->references('id')
                ->onDelete('cascade');
            $table->bigInteger('category_id')->index();
            $table->foreign('category_id')->on('post_categories')->references('id')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts_categories');
        Schema::dropIfExists('posts');
        Schema::dropIfExists('post_categories');
    }
}
