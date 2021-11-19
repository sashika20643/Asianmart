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
            $table->increments('id');
            $table->string('product_id');
            $table->string('name');
            $table->string('description');
            $table->string('image');
            $table->string('vlink1');
            $table->string('vlink2');
            $table->decimal('price',6,2);
            $table->decimal('discount',6,2);
            $table->integer('quantity');
            $table->decimal('rating',2,2)->default(0.0);
            $table->string('categery');
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
