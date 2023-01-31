<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClasseEnseignantTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classe_enseignant', function (Blueprint $table) {
            $table->bigInteger('classe_IdClasse');
            $table->unsignedBigInteger('enseignant_id');
            $table->foreign('classe_IdClasse')->references('IdClasse')->on('classes')->onDelete('cascade');
            $table->foreign('enseignant_id')->references('id')->on('enseignants')->onDelete('cascade');
            $table->integer('anneescol')->default(date("Y"));
            $table->primary(['classe_IdClasse', 'enseignant_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('classe_enseignant');
    }
}
