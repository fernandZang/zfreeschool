<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSituationProblemesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('situation_problemes', function (Blueprint $table) {
            $table->id();
            $table->longText("contexte");
            $table->unsignedBigInteger("cour_id")->index();
            $table->timestamps();

            $table->foreign("cour_id")->references("id")->on('cours');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('situation_problemes');
    }
}
