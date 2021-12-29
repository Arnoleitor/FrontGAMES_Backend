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
            $table->id();
            $table->unsignedInteger('iduser');
            $table->foreign('iduserpost')
            ->references('id')
            ->on('users')
            ->unsigned()
            ->constrained('users')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->string('title',50);
            $table->string('text',500);
            $table->string('image');
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
