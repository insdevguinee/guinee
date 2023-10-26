<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnginsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('engins', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('number_team')->nullable();
            $table->string('number')->nullable();
            $table->string('brand')->nullable();
            $table->string('engin_type')->nullable();
            $table->integer('created_by')->unsigned()->nullable();
            $table->boolean('etat')->default(0);            
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
        Schema::dropIfExists('engins');
    }
}
