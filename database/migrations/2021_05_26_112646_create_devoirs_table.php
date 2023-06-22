<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDevoirsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('devoirs', function (Blueprint $table) {
            $table->id();
            $table->longText("contexte");
            $table->unsignedBigInteger("cour_id")->nullable()->index();
            $table->unsignedBigInteger("ue_id")->nullable()->index();
            $table->timestamps();

            $table->foreign("cour_id")->references("id")->on('cours');
            $table->foreign("cour_id")->references("id")->on('ues');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('devoirs');
    }
}
