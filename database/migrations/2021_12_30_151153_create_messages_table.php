<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {

            $table->increments('id');
            $table->unsignedInteger('idchat');
            $table->foreign('idchat')
            ->references('id')
            ->on('chats')
            ->unsigned()
            ->constrained('chats')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->unsignedInteger('idfriends');
            $table->foreign('idfriends')
            ->references('id')
            ->on('friends')
            ->unsigned()
            ->constrained('friends')
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
        Schema::dropIfExists('messages');
    }
}
