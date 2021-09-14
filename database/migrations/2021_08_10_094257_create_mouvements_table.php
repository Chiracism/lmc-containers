<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMouvementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mouvements', function (Blueprint $table) {
            $table->id();
            $table->string('numero_conteneur');
            $table->string('site');
            $table->string('sous_site');
            $table->date('date_mouvement');
            $table->string('ex_navire');
            $table->date('date_arrivee');
            $table->string('port');
            $table->string('client');
            $table->string('etat_conteneur');
            $table->string('type_conteneur');
            $table->string('size');
            $table->integer('nombre_conteneur');
            $table->string('observation');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mouvements');
    }
}
