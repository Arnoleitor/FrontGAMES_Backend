<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {

            $table->increments('id');
            $table->string('name',30);
            $table->string('role',10);
            $table->string('age',3);
            $table->string('surname',50);
            $table->string('nickname',20);
            $table->string('favoritegame',20);
            $table->string('city',20);
            $table->string('email',50)->unique();
            $table->string('password',100);
            $table->string('idpsn',30);
            $table->string('idsteam',30);
            $table->string('idxbox',30);
            $table->string('idnintendo',30);
            $table->string('idepicgames',30);
            $table->string('idactivision',30);
            $table->string('idblizzard',30);
            $table->string('idriotgames',30);
            $table->string('iduplay',30);
            $table->string('idbattlenet',30);
            $table->string('idbethesda',30);
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
        Schema::dropIfExists('users');
    }
}
