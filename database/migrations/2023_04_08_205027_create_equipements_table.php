<?php 
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEquipementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void 
     */
    public function up()
    {
        Schema::create('equipements', function (Blueprint $table) {
            $table->bigIncrements('id_equipement')->primaryKey(); 
            $table->string('name')->unique();
            $table->string('modele');
            $table->string('marque');
            $table->string('designation');
            $table->string('numserie');
            $table->unsignedBigInteger('modalite_id_modalite');
            $table->unsignedBigInteger('client_id_client');
            $table->unsignedBigInteger('software');
            $table->string('contrat');
            $table->string('type_contrat');
                // Ajouter la contrainte de clé étrangère après avoir créé la colonne `modalite_id et 'client_id`
            $table->foreign('modalite_id_modalite')->references('id_modalite')->on('modalites');
            $table->foreign('client_id_client')->references('id_client')->on('clients');
            $table->string('date_installation');
            $table->integer('plan_prev');
            $table->string('document');
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
        Schema::dropIfExists('equipements');
    }
}

