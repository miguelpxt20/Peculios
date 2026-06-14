<?php
declare(strict_types=1);

use Migrations\BaseSeed;

class ContribuicoesSeed extends BaseSeed
{
    public function run(): void
    {
        $data = [
            // Contrato 1 - João Silva
            [
                'contrato_id'    => 1,
                'competencia'    => '2024-01-01',
                'valor'          => 1250.00,
                'status'         => 'paga',
                'data_pagamento' => '2024-01-05',
                'created'        => date('Y-m-d H:i:s'),
                'modified'       => date('Y-m-d H:i:s'),
            ],
            [
                'contrato_id'    => 1,
                'competencia'    => '2024-02-01',
                'valor'          => 1250.00,
                'status'         => 'paga',
                'data_pagamento' => '2024-02-05',
                'created'        => date('Y-m-d H:i:s'),
                'modified'       => date('Y-m-d H:i:s'),
            ],
            [
                'contrato_id'    => 1,
                'competencia'    => '2024-03-01',
                'valor'          => 1250.00,
                'status'         => 'paga',
                'data_pagamento' => '2024-03-05',
                'created'        => date('Y-m-d H:i:s'),
                'modified'       => date('Y-m-d H:i:s'),
            ],
            // Contrato 2 - Maria Oliveira
            [
                'contrato_id'    => 2,
                'competencia'    => '2024-03-01',
                'valor'          => 4500.00,
                'status'         => 'paga',
                'data_pagamento' => '2024-03-05',
                'created'        => date('Y-m-d H:i:s'),
                'modified'       => date('Y-m-d H:i:s'),
            ],
            [
                'contrato_id'    => 2,
                'competencia'    => '2024-04-01',
                'valor'          => 4500.00,
                'status'         => 'paga',
                'data_pagamento' => '2024-04-05',
                'created'        => date('Y-m-d H:i:s'),
                'modified'       => date('Y-m-d H:i:s'),
            ],
            [
                'contrato_id'    => 2,
                'competencia'    => '2024-05-01',
                'valor'          => 4500.00,
                'status'         => 'atrasada',
                'data_pagamento' => null,
                'created'        => date('Y-m-d H:i:s'),
                'modified'       => date('Y-m-d H:i:s'),
            ],
        ];

        $table = $this->table('contribuicoes');
        $table->insert($data)->save();
    }
}