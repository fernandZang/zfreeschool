<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uas', function (Blueprint $table) {
            $table->id();
            $table->string("titre");
            $table->integer("duree");
            $table->timestamps();
            $table->unsignedBigInteger("module_id")->index();

            $table->foreign("module_id")->references("id")->on('modules');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('uas');
    }
}
