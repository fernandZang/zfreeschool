<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMauvaiseReponsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mauvaise_reponses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("question_id")->index();
            $table->string("reponse_f");
            $table->timestamps();
            
            $table->foreign("question_id")->references("id")->on('questions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mauvaise_reponses');
    }
}
