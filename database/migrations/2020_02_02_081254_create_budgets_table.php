<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBudgetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('budgets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('code1')->unsigned()->nullable();
            $table->string('code2')->nullable();
            $table->string('ligne_budget')->nullable();
            $table->integer('compta')->nullable();
            $table->string('phase_operation')->nullable();
            $table->text('libelle')->nullable();
            $table->timestamps();
        });

        Schema::create('budgetCategories', function (Blueprint $table)
        {
            $table->bigInteger('id');
            $table->string('titre');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('budgets');
        Schema::dropIfExists('budgetCategories');
    }
}
