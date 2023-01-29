<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateElevesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eleves', function (Blueprint $table) {
            $table->id();
            $table->string('CIN')->nullable();
            $table->string('IdentifiantUnique');
            $table->string('NomPrenom');
            $table->date('DateNaissance')->nullable();
            $table->string('Adresse') ->default('El-Hamma');
            $table->string('NomPere');
            $table->string('NomMere');
            $table->string('GSMPere')->nullable();
            $table->bigInteger('Classe_id');
            $table->foreign('Classe_id')->references('IdClasse')->on('classes')->onDelete('cascade');
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
        Schema::dropIfExists('eleves');
    }
}
