<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TabelaEstadoDados extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('state')->insert(
            [
                [ 'name' => 'Acre', 'abbreviation' => 'AC' ],
                [ 'name' => 'Alagoas', 'abbreviation' => 'AL' ],
                [ 'name' => 'Amapá', 'abbreviation' => 'AP' ],
                [ 'name' => 'Amazonas', 'abbreviation' => 'AM' ],
                [ 'name' => 'Bahia', 'abbreviation' => 'BA' ],
                [ 'name' => 'Ceará', 'abbreviation' => 'CE' ],
                [ 'name' => 'Distrito Federal', 'abbreviation' => 'DF' ],
                [ 'name' => 'Espirito Santo', 'abbreviation' => 'ES' ],
                [ 'name' => 'Goias', 'abbreviation' => 'GO' ],
                [ 'name' => 'Maranhão', 'abbreviation' => 'MA' ],
                [ 'name' => 'Mato Grosso', 'abbreviation' => 'MT' ],
                [ 'name' => 'Mato Grosso do Sul', 'abbreviation' => 'MS' ],
                [ 'name' => 'Minas Gerais', 'abbreviation' => 'MG' ],
                [ 'name' => 'Para', 'abbreviation' => 'PA' ],
                [ 'name' => 'Paraíba', 'abbreviation' => 'PB' ],
                [ 'name' => 'Paraná', 'abbreviation' => 'PR' ],
                [ 'name' => 'Pernambuco', 'abbreviation' => 'PE' ],
                [ 'name' => 'Piauí', 'abbreviation' => 'PI' ],
                [ 'name' => 'Rio de Janeiro', 'abbreviation' => 'RJ' ],
                [ 'name' => 'Rio Grande do Sul', 'abbreviation' => 'RN' ],
                [ 'name' => 'Rio Grande do Norte', 'abbreviation' => 'RS' ],
                [ 'name' => 'Rondonia', 'abbreviation' => 'RO' ],
                [ 'name' => 'Roraima', 'abbreviation' => 'RR' ],
                [ 'name' => 'Santa Catarina', 'abbreviation' => 'SC' ],
                [ 'name' => 'São Paulo', 'abbreviation' => 'SP' ],
                [ 'name' => 'Sergipe', 'abbreviation' => 'SE' ],
                [ 'name' => 'Tocantins', 'abbreviation' => 'TO' ],
            ]
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
