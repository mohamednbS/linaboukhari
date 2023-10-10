<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMpreventivesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('mpreventives', function (Blueprint $table) {
            $table->bigIncrements('id_mpreventive')->primaryKey();
            $table->string('numero')->unique();
            $table->string('status');
            $table->string('umesure');
            $table->integer('equipement_name');
            $table->integer('numserie');
            $table->integer('client_name');
            $table->string('intervalle');
            $table->string('executeur'); 
            $table->date('date_prochaine');
            $table->date('date_debut')->nullable();
            $table->date('date_fin')->nullable();
            $table->date('date_execution')->nullable();
            $table->string('etat');
            $table->string('observation')->nullable();
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
