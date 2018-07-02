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
            $table->text('name', 255);
            $table->integer('sub_category_id')->unsigned()->nullable();
            $table->integer('price')->unsigned();
            $table->integer('quantity')->unsigned();
            $table->timestamps();

            $table->foreign('sub_category_id')
                    ->references('id')
                    ->on('sub_categories')
                    ->onDelete('set null')
                    ->onUpdate('cascade');
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
