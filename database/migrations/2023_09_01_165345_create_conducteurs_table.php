<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConducteursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conducteurs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('last_name')->nullable();
            $table->string('name')->nullable();
            $table->string('phone')->nullable();
            $table->integer('supervisor_id')->nullable();
            $table->string('number_team')->nullable();
            $table->string('number_car')->nullable();
            $table->string('brand_car')->nullable();
            $table->integer('created_by')->unsigned()->nullable();
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
        Schema::dropIfExists('conducteurs');
    }
}
