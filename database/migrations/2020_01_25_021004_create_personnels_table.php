<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonnelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personnels', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('matricule')->unique();
            $table->string('nom')->nullable();
            $table->string('prenoms')->nullable();
            $table->integer('fonction_id')->unsigned();
            $table->string('mm_numero')->nullable();
            $table->string('contact')->nullable();
            $table->integer('direction_id')->nullable();
            $table->string('numero_equipe')->nullable();
            $table->integer('created_by')->unsigned();
            $table->boolean('etat')->default(0);
            $table->softDeletes();
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
        Schema::dropIfExists('personnels');
    }
}
