<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BlogCommentTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('blog_comment', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email');
            $table->text('comment');
            $table->boolean('approved');
            $table->unsignedBigInteger('blog_id');
            $table->timestamps();
        });

        Schema::table('blog_comment', function($table) {
            $table->foreign('blog_id')->references('id')->on('blog')->onDelete('cascade');
        });
    }

    public function down() {
        
        Schema::dropForeign('blog_id');
        Schema::dropIfExists('blog_comment');
    }

}
