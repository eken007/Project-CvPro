<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormCreateCvTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('createcvs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('creator_id')->nullable();
            $table->string('name')->nullable();
            $table->string('prenom')->nullable();
            $table->string('email')->nullable();
            $table->string('numero')->nullable();
            $table->string('villepersonne')->nullable();
            $table->string('quartierpersonne')->nullable();
            $table->longText('objectif')->nullable();
            $table->string('poste')->nullable();
            $table->string('avatar')->nullable();
            $table->string('employeur')->nullable();
            $table->string('villetravail')->nullable();
            $table->date('datedebuttravail')->nullable();
            $table->date('datefintravail')->nullable();
            $table->longText('descriptiontravail')->nullable();
            $table->string('formation')->nullable();
            $table->string('villeformation')->nullable();
            $table->string('etablissement')->nullable();
            $table->date('datedebutformation')->nullable();
            $table->date('datefinformation')->nullable();
            $table->longText('descriptionformation')->nullable();
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
        Schema::dropIfExists('createcv');
    }
}
