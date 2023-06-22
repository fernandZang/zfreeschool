<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->string("type_question");
            $table->string("question");
            $table->string("reponse");
            $table->string("explication");
            $table->integer('numero_qst');
            $table->unsignedBigInteger("prerequi_id")->nullable()->index();
            $table->unsignedBigInteger("situation_probleme_id")->nullable()->index();
            $table->unsignedBigInteger("devoir_id")->nullable()->index();
            $table->timestamps();
            
            $table->foreign("devoir_id")->references("id")->on('devoirs');
            $table->foreign("situation_probleme_id")->references("id")->on('situation_problemes');
            $table->foreign("prerequi_id")->references("id")->on('prerequis');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questions');
    }
}
