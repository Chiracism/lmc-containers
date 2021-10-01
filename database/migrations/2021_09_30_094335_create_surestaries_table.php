<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurestariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surestaries', function (Blueprint $table) {
            $table->id();
            $table->date('surestarie_date');
            $table->string('numero_conteneur')->unique();
            $table->string('ex_navire');
            $table->date('date_arrivee');
            $table->string('client_name');
            $table->string('port_name');
            $table->string('size_name');
            $table->integer('nombre');
            $table->date('restitution_date');
            $table->float('caution_versee');
            $table->string('nls');
            $table->date('ls_date');
            $table->string('choix_type');
            $table->integer('detention');
            $table->integer('surestarie_duree');
            $table->integer('surestaries_duree');
            $table->float('frais');
            $table->float('facturer');
            $table->float('rembourser');
            $table->float('total');
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
        Schema::dropIfExists('surestaries');
    }
}
