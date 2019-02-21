<?php

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
            $table->string('name',200);
            $table->string('code',120)->unique();
            $table->longText('description')->nullabled();
            $table->string('category',200)->nullabled();
            $table->string('mainImage', 200)->unique();
            $table->string('oneImage', 200)->nullabled();
            $table->string('twoImage', 200)->nullabled();
            $table->string('threeImage', 200)->nullabled();
            $table->integer('state');
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
        Schema::drop('products');
    }
}
