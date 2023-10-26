<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCaissesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('caisses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->enum('type',['enregistrement','depense'])->default('enregistrement');
            $table->string('code')->unique();
            $table->integer('imputation_id')->nullable();
            $table->integer('direction_id');
            $table->text('observation')->nullable();
            $table->string('num_facture')->nullable();
            $table->integer('tiers')->nullable();
            $table->string('libelle')->nullable();
            $table->string('ligne_budget')->nullable();
            $table->enum('paiement',['cheque','v_mtn','espece']);
            $table->string('ref_paiement')->nullable();
            $table->integer('debit')->nullable();
            $table->integer('parent_id')->nullable();
            $table->string('recu')->nullable();
            $table->date('date_en')->nullable();
            $table->integer('credit')->nullable();
            $table->integer('user_id')->unsigned();
            $table->timestamps();
        });

        Schema::create('imputations', function (Blueprint $table)
        {
            $table->bigIncrements('id');
            $table->integer('code')->unsigned()->unique();
            $table->string('libelle')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('caisses');
        Schema::dropIfExists('imputations');
    }
}
