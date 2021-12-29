<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coments', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('iduser');
            $table->foreign('idusercomment')
            ->references('id')
            ->on('users')
            ->unsigned()
            ->constrained('users')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->unsignedInteger('idpost');
            $table->foreign('idpostcomment2')
            ->references('id')
            ->on('posts')
            ->unsigned()
            ->constrained('posts')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->string('coment',200);
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
        Schema::dropIfExists('coments');
    }
}
