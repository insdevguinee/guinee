<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('prenom')->nullable();
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->integer('direction_id')->unsigned();
            $table->string('photo')->default('/img/avatar.png');
            $table->string('password')->nullable();
             $table->enum('statut',['attente','active','bloqué','supprimé'])->default('active');
            $table->rememberToken();
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamps();
        });

        Schema::create('directions', function (Blueprint $table)
        {
            $table->increments('id');
            $table->string('libelle')->nullable();
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
        Schema::dropIfExists('directions');
        Schema::dropIfExists('users');
    }
}
