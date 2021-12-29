<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chats', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('iduser');
            $table->foreign('iduser')
            ->references('id')
            ->on('users')
            ->unsigned()
            ->constrained('iduser')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->unsignedInteger('friend');
            $table->foreign('friend')
            ->references('id')
            ->on('users')
            ->unsigned()
            ->constrained('friend')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->string('message',500);
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
        Schema::dropIfExists('chats');
    }
}
