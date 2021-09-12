<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/*
PHP_M13 - Nivell 1 - Exercici 2

Defineix els Models de dades, middleware i controllers que consideres necessaris.
Recorda que la interacció amb la base de dades es realitzarà per mitjà del ORM Eloquent i
 per tant els objectes seran persistits únicament en memòria.

*/
class CreateReservaHotelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reserva_hotels', function (Blueprint $table) {
            $table->id();

            $table->string('nom');
            $table->string('cognoms');
            $table->string('passaport');
            $table->string('telefon');
            $table->string('email');
            $table->string('adreca');
            $table->string('ciutat');
            $table->string('provincia');
            $table->string('pais');
            $table->string('comentaris');
            
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
        Schema::dropIfExists('reserva_hotels');
    }
}
