<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdreInterventionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('ointerventions', function (Blueprint $table) {
            $table->bigIncrements('id_intervention')->primaryKey();
            $table->string('numero');
            $table->integer('equipement_name');
            $table->integer('souseq_name')->nullable();
            $table->integer('client_name');
            $table->string('type_panne');
            $table->string('description_panne');
            $table->string('priorite');
            $table->string('mode_appel');
            $table->string('destinateur');
            $table->string('appel_client');
            $table->text('commentaire')->nullable();
            $table->text('observation')->nullable();
            $table->datetime('date_intervention')->nullable();
            $table->datetime('date_fin_intervention')->nullable();
            $table->string('etat');
            $table->string('document')->nullable();
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
        //
    }
}
