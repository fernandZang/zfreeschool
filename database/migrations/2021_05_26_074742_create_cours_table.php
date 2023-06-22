<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cours', function (Blueprint $table) {
            $table->id();            
            $table->longText("trace_ecrite")->nullable();
            $table->string("contenu")->nullable();
            $table->integer('etat')->default(0); //             1 si le cours est terminé et 0 si non
            $table->string("statut")->default('non valide');
            $table->unsignedBigInteger("ue_id")->index();
            $table->unsignedBigInteger("enseignant_id")->index();
            $table->timestamps();

            $table->foreign("enseignant_id")->references("id")->on('enseignants'); 

            $table->foreign("ue_id")->references("id")->on('ues');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cours');
    }
}
