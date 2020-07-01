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
            $table->string('description');
            $table->integer('unity');
            $table->double('price', 10 , 2);
            $table->string('reference');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('ncm_id');
            $table->unsignedBigInteger('aliquot_id');
            $table->unsignedBigInteger('cson_id');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('ncm_id')->references('id')->on('ncms');
            $table->foreign('aliquot_id')->references('id')->on('aliquots');
            $table->foreign('cson_id')->references('id')->on('csons');
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
