<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('personnel_id')->unsigned();
            $table->integer('prime')->nullable();
            $table->integer('transport')->nullable();
            $table->integer('mise_route')->nullable();
            $table->integer('conges')->nullable();
            $table->integer('gratification')->nullable();
            $table->integer('carburant')->nullable();
            $table->integer('communication')->nullable();
            $table->integer('perdiem')->nullable();
            $table->integer('internet')->nullable();
            $table->integer('guide')->nullable();
            $table->integer('prime_ni')->nullable();
            $table->integer('avance')->nullable();
            $table->integer('actif')->default(1);
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
        Schema::dropIfExists('paies');
    }
}
