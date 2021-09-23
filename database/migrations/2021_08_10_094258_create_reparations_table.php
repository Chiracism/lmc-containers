<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReparationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reparations', function (Blueprint $table) {
            $table->id();
            $table->string('numero_conteneur')->unique();
            $table->date('date_derniere_reparation');
            $table->string('type_conteneur_id');
            $table->string('taille_conteneur_id');
            $table->string('proprietaire_id');
            $table->string('pays_name');
            $table->float('taux_name');
            $table->float('heure');
            $table->string('materiel_id');
            $table->float('total');
            $table->string('numero_recu');
            $table->string('societe_reparation');
            $table->string('societe_location');
            $table->string('site_id');
            $table->string('date_derniere_inspection');
            $table->string('societe');
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
        Schema::dropIfExists('reparations');
    }
}
