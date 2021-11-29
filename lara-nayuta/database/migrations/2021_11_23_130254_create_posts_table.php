<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->text('post');
            $table->integer('rnd-1');
            $table->integer('rnd-2');
            $table->integer('rnd-3');
            
            $table->integer('now-x');
            $table->integer('now-like');
            $table->integer('now-num'); /*0001~9999 */
            $table->integer('now-dig'); /*1,2,3で */
            $table->boolean('runstop'); /*trueでいいね機構動く */
            

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
        Schema::dropIfExists('posts');
    }
}
