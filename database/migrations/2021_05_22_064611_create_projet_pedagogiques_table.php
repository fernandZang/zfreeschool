<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjetPedagogiquesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projet_pedagogiques', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("niveau_matiere_id")->nullable()->index();
            $table->timestamps();
            
            $table->foreign("niveau_matiere_id")->references("id")->on('niveau_matieres');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projet_pedagogiques');
    }
}
