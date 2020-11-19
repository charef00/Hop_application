<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) 
        {
             $table->bigIncrements('id');
            $table->boolean('civilite')->default(0);
            $table->string('prenom');
            $table->string('nom');
            $table->string('fonction')->nullable();;
            $table->string('service')->nullable();;
            $table->string('email');
            $table->string('telephone')->nullable();;
            $table->string('date_naissance')->nullable();;
            $table->string('nom_societe')->nullable();;
            $table->string('adresse_societe')->nullable();;
            $table->string('code_postal_societe')->nullable();;
            $table->string('ville_societe')->nullable();;
            $table->string('telephone_societe')->nullable();;
            $table->string('site_web_societe')->nullable();;
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
        Schema::dropIfExists('contacts');
    }
}
