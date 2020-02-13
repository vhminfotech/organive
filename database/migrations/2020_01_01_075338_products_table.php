<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProductsTable extends Migration
{
    public function up()
    {
       Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('img');
            $table->string('label');
            $table->string('name');
            $table->string('description');
            $table->integer('price');
            $table->integer('category');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    
    public function down()
    {
       Schema::dropIfExists('products');
    }
}
