<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormAnnonceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('annonces', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('creator_id')->nullable();
            $table->string('name_creator')->nullable();
            $table->string('prenom_creator')->nullable();
            $table->string('titre')->nullable();
            $table->string('ville')->nullable();
            $table->string('email_creator')->nullable();
            $table->string('type')->nullable();
            $table->date('datelimit')->nullable();
            $table->string('categorie')->nullable();
            $table->longText('description')->nullable();
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
        Schema::dropIfExists('form_annonce');
    }
}
