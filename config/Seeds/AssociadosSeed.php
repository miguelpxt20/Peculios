<?php
declare(strict_types=1);

use Migrations\BaseSeed;

class AssociadosSeed extends BaseSeed
{
    public function run(): void
    {
        $data = [
            [
                'matricula'       => 'MIL-001',
                'nome'            => 'João Silva Santos',
                'cpf'             => '123.456.789-01',
                'patente'         => 'Capitão',
                'situacao'        => 'ativo',
                'data_ingresso'   => '2010-03-15',
                'data_nascimento' => '1980-07-20',
                'created'         => date('Y-m-d H:i:s'),
                'modified'        => date('Y-m-d H:i:s'),
            ],
            [
                'matricula'       => 'MIL-002',
                'nome'            => 'Maria Oliveira Costa',
                'cpf'             => '987.654.321-02',
                'patente'         => 'Tenente',
                'situacao'        => 'ativo',
                'data_ingresso'   => '2015-06-01',
                'data_nascimento' => '1990-02-14',
                'created'         => date('Y-m-d H:i:s'),
                'modified'        => date('Y-m-d H:i:s'),
            ],
            [
                'matricula'       => 'MIL-003',
                'nome'            => 'Carlos Eduardo Lima',
                'cpf'             => '456.789.123-03',
                'patente'         => 'Sargento',
                'situacao'        => 'reserva',
                'data_ingresso'   => '2000-01-10',
                'data_nascimento' => '1975-11-30',
                'created'         => date('Y-m-d H:i:s'),
                'modified'        => date('Y-m-d H:i:s'),
            ],
        ];

        $table = $this->table('associados');
        $table->insert($data)->save();
    }
}