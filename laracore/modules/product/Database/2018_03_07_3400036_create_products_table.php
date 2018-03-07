<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('description')->nullable();
            $table->longText('content')->nullable();
            $table->unsignedInteger('admin_id')->index();
            $table->foreign('admin_id')->on('admins')->references('id')
                ->onDelete('cascade');
            $table->string('featured_image')->nullable();
            $table->text('images')->nullable();
            $table->decimal('price',15,2)->nullable();
            $table->decimal('discount',15,2)->nullable();
            $table->string('sku')->nullable();
            $table->boolean('published')->default(false);
            $table->integer('pos')->nullable();
            $table->timestamps();
        });
        
        Schema::create('product_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('description')->nullable();
            $table->integer('parent_id')->nullable();
            $table->string('featured_image')->nullable();
            $table->boolean('published')->default(false);
            $table->integer('pos')->nullable();
            $table->timestamps();
        });

        Schema::create('products_categories', function (Blueprint $table) {
            $table->bigInteger('product_id')->index();
            $table->foreign('product_id')->on('products')->references('id')
                ->onDelete('cascade');
            $table->bigInteger('category_id')->index();
            $table->foreign('category_id')->on('product_categories')->references('id')
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
        Schema::dropIfExists('products_categories');
        Schema::dropIfExists('products');
        Schema::dropIfExists('product_categories');
    }
}
