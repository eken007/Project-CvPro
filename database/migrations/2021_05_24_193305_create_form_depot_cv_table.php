<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormDepotCvTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deposer_cvs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('creator_id')->nullable();
            $table->string('name')->nullable();
            $table->string('prenom')->nullable();
            $table->string('numero')->nullable();
            $table->string('file')->nullable();
            $table->string('image')->nullable();
            $table->string('booster')->nullable();
            $table->string('booster_id')->nullable();
            $table->bigInteger('nombre')->nullable();
            $table->string('categorie')->nullable();
            $table->longText('description')->nullable();
            $table->timestamps();
        });    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('form_depot_cv');
    }
}
