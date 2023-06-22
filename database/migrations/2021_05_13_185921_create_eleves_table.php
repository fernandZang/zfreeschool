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
            $table->unsignedBigInteger("user_id")->index();
            $table->unsignedBigInteger("niveau_id")->index();
            $table->unsignedBigInteger("classe_id")->nullable()->index();
            $table->unsignedBigInteger("enseignant_id")->nullable()->index();
            $table->timestamps();

            $table->foreign("classe_id")->references("id")->on('classes');
            $table->foreign("niveau_id")->references("id")->on('niveaux');
            $table->foreign("enseignant_id")->references("id")->on('enseignants');
            $table->foreign("user_id")->references("id")->on('users');
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
