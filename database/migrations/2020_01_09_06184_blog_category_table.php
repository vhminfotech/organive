<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BlogCategoryTable extends Migration
{
    public function up()
    {
        Schema::create('blogcategory', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('blogcategory_name');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('blogcategory');
    }
}
