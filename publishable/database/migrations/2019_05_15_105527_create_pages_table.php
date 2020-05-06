<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->bigIncrements('id');            
            $table->string('page_title')->unique();
            $table->string('slug');            
            $table->string('page_excerpt');
            $table->text('page_content');
            $table->string('feature_image')->nullable();
            $table->enum('page_type',['page','post']);            
            $table->enum('page_status',['publish','unpublish']);
            $table->enum('comment_status',['open', 'close']);            
            $table->integer('comment_count')->nullable();            
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
        Schema::dropIfExists('pages');
    }
}
