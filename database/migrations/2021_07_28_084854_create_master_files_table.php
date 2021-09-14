<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasterFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_files', function (Blueprint $table) {
            $table->id();
            $table->string('numero_conteneur');
            $table->string('pays_id');
            $table->string('type_conteneur_id');
            $table->string('taille_conteneur_id');
            $table->string('materiel_id');
            $table->string('proprietaire_id');
            $table->string('etat_conteneur_id');
            $table->string('constructeur');
            $table->date('date_fabrication');
            $table->date('date_entrer_service');
            $table->date('date_derniere_inspection');
            $table->float('valeur_assuree');
            $table->string('devise_id');
            $table->string('societe_inspection');
            $table->string('dernier_constat');
            $table->string('site_id');
            $table->string('sous_site_id');
            $table->date('date_mouvement');
            $table->string('observation');
            $table->string('client');
            $table->date('date_operation');
            $table->float('montant');
            $table->string('numero_recu');
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
        Schema::dropIfExists('master_files');
    }
}
