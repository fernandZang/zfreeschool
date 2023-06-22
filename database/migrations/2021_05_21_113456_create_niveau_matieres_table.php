<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNiveauMatieresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('niveau_matieres', function (Blueprint $table) {
            $table->id();
            $table->string('groupe');
            $table->integer('coef');
            $table->unsignedBigInteger("matiere_id")->index();
            $table->unsignedBigInteger("niveau_id")->index();
            $table->timestamps();

            $table->foreign("niveau_id")->references("id")->on('niveaux');
            $table->foreign("matiere_id")->references("id")->on('matieres');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('niveau_matieres');
    }
}
