<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seances', function (Blueprint $table) {
            $table->id();
            $table->date('date')->default(date("Y-m-d"));
            $table->time('debut');
            $table->time('fin');
            $table->bigInteger('classe_IdClasse');
            $table->unsignedBigInteger('enseignant_id');
            $table->foreign('classe_IdClasse')->references('IdClasse')->on('classes')->onDelete('cascade');
            $table->foreign('enseignant_id')->references('id')->on('enseignants')->onDelete('cascade');
            $table->unsignedBigInteger('matiere_id');
            $table->foreign('matiere_id')->references('id')->on('matieres')->onDelete('cascade');
            $table->text('commentaire')->nullable();
            $table->string('absents')->nullable();
            $table->string('exclus')->nullable();
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
        Schema::dropIfExists('seances');
    }
}
