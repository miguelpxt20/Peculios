<?php
declare(strict_types=1);

use Migrations\BaseSeed;

class ContratosPeculioSeed extends BaseSeed
{
    public function run(): void
    {
        $data = [
            [
                'associado_id'     => 1,
                'plano_id'         => 1,
                'numero_contrato'  => 'CONT-2024-001',
                'data_inicio'      => '2024-01-01',
                'data_fim'         => null,
                'status'           => 'vigente',
                'created'          => date('Y-m-d H:i:s'),
                'modified'         => date('Y-m-d H:i:s'),
            ],
            [
                'associado_id'     => 2,
                'plano_id'         => 2,
                'numero_contrato'  => 'CONT-2024-002',
                'data_inicio'      => '2024-03-01',
                'data_fim'         => null,
                'status'           => 'vigente',
                'created'          => date('Y-m-d H:i:s'),
                'modified'         => date('Y-m-d H:i:s'),
            ],
            [
                'associado_id'     => 3,
                'plano_id'         => 1,
                'numero_contrato'  => 'CONT-2023-001',
                'data_inicio'      => '2023-06-01',
                'data_fim'         => '2024-06-01',
                'status'           => 'encerrado',
                'created'          => date('Y-m-d H:i:s'),
                'modified'         => date('Y-m-d H:i:s'),
            ],
        ];

        $table = $this->table('contratos_peculio');
        $table->insert($data)->save();
    }
}