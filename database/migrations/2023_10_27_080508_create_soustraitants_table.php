<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSoustraitantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('soustraitants', function (Blueprint $table) {
            $table->bigIncrements('id_soustraitant')->primaryKey();
            $table->string("name");
            $table->text('phone');
            $table->text('fax');
            $table->text('email');
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
        Schema::table('soustraitants', function (Blueprint $table) {
            //
            $table->dropSoftDeletes();
        });
    }
}
