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
        DB::table('estado')->insert(
            [
                [ 'nome' => 'Acre', 'Sigla' => 'AC' ],
                [ 'nome' => 'Alagoas', 'Sigla' => 'AL' ],
                [ 'nome' => 'Amapá', 'Sigla' => 'AP' ],
                [ 'nome' => 'Amazonas', 'Sigla' => 'AM' ],
                [ 'nome' => 'Bahia', 'Sigla' => 'BA' ],
                [ 'nome' => 'Ceará', 'Sigla' => 'CE' ],
                [ 'nome' => 'Distrito Federal', 'Sigla' => 'DF' ],
                [ 'nome' => 'Espirito Santo', 'Sigla' => 'ES' ],
                [ 'nome' => 'Goias', 'Sigla' => 'GO' ],
                [ 'nome' => 'Maranhão', 'Sigla' => 'MA' ],
                [ 'nome' => 'Mato Grosso', 'Sigla' => 'MT' ],
                [ 'nome' => 'Mato Grosso do Sul', 'Sigla' => 'MS' ],
                [ 'nome' => 'Minas Gerais', 'Sigla' => 'MG' ],
                [ 'nome' => 'Para', 'Sigla' => 'PA' ],
                [ 'nome' => 'Paraíba', 'Sigla' => 'PB' ],
                [ 'nome' => 'Paraná', 'Sigla' => 'PR' ],
                [ 'nome' => 'Pernambuco', 'Sigla' => 'PE' ],
                [ 'nome' => 'Piauí', 'Sigla' => 'PI' ],
                [ 'nome' => 'Rio de Janeiro', 'Sigla' => 'RJ' ],
                [ 'nome' => 'Rio Grande do Sul', 'Sigla' => 'RN' ],
                [ 'nome' => 'Rio Grande do Norte', 'Sigla' => 'RS' ],
                [ 'nome' => 'Rondonia', 'Sigla' => 'RO' ],
                [ 'nome' => 'Roraima', 'Sigla' => 'RR' ],
                [ 'nome' => 'Santa Catarina', 'Sigla' => 'SC' ],
                [ 'nome' => 'São Paulo', 'Sigla' => 'SP' ],
                [ 'nome' => 'Sergipe', 'Sigla' => 'SE' ],
                [ 'nome' => 'Tocantins', 'Sigla' => 'TO' ],
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
