<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id_user')->primaryKey();
            $table->string('name');
            $table->string('matricule')->nullable();
<<<<<<< HEAD
            $table->string('email')->unique();
=======
            $table->string('useremail')->unique();
>>>>>>> e121b86aa98783be36c6b4fe44980a592ea45271
            $table->string('password');
            $table->string('modalité')->nullable();
            $table->string('phone')->nullable();
            $table->text('description')->nullable();
            $table->string('role')->default('Administrateur');
            $table->integer('iddep')->nullable();
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
        Schema::dropIfExists('users');
    }
}
