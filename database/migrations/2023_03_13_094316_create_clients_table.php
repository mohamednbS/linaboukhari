<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use illuminate\Support\Facades\DB;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */  
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->bigIncrements('id_client')->primaryKey();
            $table->string('clientname');
            $table->string('adresse');
            $table->string('email');  
            $table->integer('mobile');
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
        Schema::dropIfExists('clients');
    }
}
