<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContratsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('contrats', function (Blueprint $table) {
            $table->bigIncrements('id_contrat')->primaryKey();
            $table->string('client_name'); 
            $table->string('equipement_name');
            $table->string('souseq_name');
           
            $table->date('date_debut');
            $table->date('date_fin');
            $table->string('type_contrat');
            $table->integer('status')->nullable();
            $table->text('note')->nullable();
            $table->rememberToken();
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
