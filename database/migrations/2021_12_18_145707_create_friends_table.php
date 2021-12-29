<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFriendsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('friends', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('iduser1');
            $table->foreign('iduser1friend')
            ->references('id')
            ->on('users')
            ->unsigned()
            ->constrained('users')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->unsignedInteger('iduser2');
            $table->foreign('iduser2friend')
            ->references('id')
            ->on('users')
            ->unsigned()
            ->constrained('users')
            ->onUpdate('cascade')
            ->onDelete('cascade');
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
        Schema::dropIfExists('friends');
    }
}
