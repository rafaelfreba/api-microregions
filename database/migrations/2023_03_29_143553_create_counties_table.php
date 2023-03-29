<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //cria a tabela municípios
        Schema::create('counties', function (Blueprint $table) {
            $table->id();
            //código único que identifica o município
            $table->integer('ibge');
            //nome do município
            $table->string('name');
            //unidade federativa (UF) -> padrão MT -> Mato Grosso
            $table->char('fu', 2)->default('MT');
            //microrregião de saúde
            $table->string('microregion');
            //município sede da região
            $table->string('poleMunicipality');
            //macro região de saúde
            $table->string('macroregion');
            //distância do município pólo
            $table->string('distance_from_pole_municipality');
            //distância da capital
            $table->string('distance_from_the_capital');
            //imagem do mapa estadual indicando o município
            $table->string('img_map');
            //status da questão 1-ativo (padrão) ou 0-iantivo
            $table->boolean('status')->default(1);
            //datas de criação e atualização do registro na tabela
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
        Schema::dropIfExists('counties');
    }
};
