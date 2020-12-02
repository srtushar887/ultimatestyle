<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->integer('product_top_cat_id')->nullable();
            $table->integer('product_mid_cat_id')->nullable();
            $table->integer('product_end_cat_id')->nullable();
            $table->string('product_name')->nullable();
            $table->string('old_price')->nullable();
            $table->string('current_price')->nullable();
            $table->string('quantity')->nullable();
            $table->string('is_featured')->nullable();
            $table->string('is_latest')->nullable();
            $table->string('is_popular')->nullable();
            $table->text('main_image')->nullable();
            $table->text('image_one')->nullable();
            $table->text('image_two')->nullable();
            $table->text('image_three')->nullable();
            $table->text('image_four')->nullable();
            $table->text('image_five')->nullable();
            $table->text('image_six')->nullable();
            $table->text('description')->nullable();
            $table->text('sort_des')->nullable();
            $table->text('featured')->nullable();
            $table->text('condition')->nullable();
            $table->text('return_policy')->nullable();
            $table->text('is_publish')->nullable();
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
        Schema::dropIfExists('products');
    }
}
