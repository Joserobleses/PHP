<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partits', function (Blueprint $table) {
            $table->id();
            
            $table->date('data_partit');
            $table->unsignedBigInteger('id_equip_1');
            $table->foreign('id_equip_1')->references('id')->on('equips');   
            $table->integer('marcador_equip_1')->nullable();
            $table->unsignedBigInteger('id_equip2');
            $table->foreign('id_equip2')->references('id')->on('equips');   
            $table->integer('marcador_equip2')->nullable();

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
        Schema::dropIfExists('partits');
    }
}
