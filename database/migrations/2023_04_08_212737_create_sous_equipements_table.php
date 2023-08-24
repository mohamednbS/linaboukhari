<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use illuminate\Support\Facades\DB;

class CreateSousequipementsTable extends Migration
{
    /**
     * Run the migrations.
     * 
     * @return void
     */ 
    public function up()
    {
        Schema::create('sousequipements', function (Blueprint $table) {
            $table->bigIncrements('id_sousequipement')->primaryKey();
            $table->string('identifiant')->unique();
            $table->string('designation');
            $table->string('date_achat');
            $table->string('date_arrive');

            $table->rememberToken();
            $table->timestamps();
            $table->unsignedBigInteger('equipement_id_equipement');
          // Ajouter la contrainte de clé étrangère après avoir créé la colonne `equipement_id`
          $table->foreign('equipement_id_equipement')->references('id_equipement')->on('equipements')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sous_equipements');
    }
}
