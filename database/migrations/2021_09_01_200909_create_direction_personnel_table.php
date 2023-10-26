<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDirectionPersonnelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('direction_user', function (Blueprint $table) {
            $table->bigInteger('direction_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();

            $table->primary(['direction_id', 'user_id']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('direction_user');
    }
}
