<?php
declare(strict_types=1);

use Migrations\BaseSeed;

class PlanosPeculioSeed extends BaseSeed
{
    public function run(): void
    {
        $data = [
            [
                'codigo'                  => 'PEC-IND-01',
                'nome'                    => 'Pecúlio Individual Básico',
                'descricao'               => 'Plano individual com cobertura básica para militares ativos.',
                'tipo'                    => 'individual',
                'valor_cobertura'         => 50000.00,
                'percentual_contribuicao' => 0.0250,
                'carencia_meses'          => 12,
                'ativo'                   => true,
                'created'                 => date('Y-m-d H:i:s'),
                'modified'                => date('Y-m-d H:i:s'),
            ],
            [
                'codigo'                  => 'PEC-FAM-01',
                'nome'                    => 'Pecúlio Familiar Premium',
                'descricao'               => 'Plano familiar com cobertura ampliada para militares e dependentes.',
                'tipo'                    => 'familiar',
                'valor_cobertura'         => 100000.00,
                'percentual_contribuicao' => 0.0450,
                'carencia_meses'          => 24,
                'ativo'                   => true,
                'created'                 => date('Y-m-d H:i:s'),
                'modified'                => date('Y-m-d H:i:s'),
            ],
        ];

        $table = $this->table('planos_peculio');
        $table->insert($data)->save();
    }
}