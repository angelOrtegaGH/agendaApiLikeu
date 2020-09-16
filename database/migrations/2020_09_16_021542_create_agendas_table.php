<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgendasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agendas', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->bigIncrements('id');
            $table->timestamps();



            $table->string("asunto", 300);
            $table->timestamp("fechaHora")->nullable()->default(null);
            $table->char("estado", 1);

            $table->bigInteger('idCliente')->unsigned()->nullable();
            $table->foreign('idCliente')->references('id')->on('clientes');// en la linea anterior y esta se definen las llaves foraneas

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agendas');
    }
}
