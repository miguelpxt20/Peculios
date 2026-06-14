<?php
declare(strict_types=1);

use Migrations\BaseSeed;

class BeneficiariosSeed extends BaseSeed
{
    public function run(): void
    {
        $data = [
            [
                'contrato_id' => 1,
                'nome'        => 'Ana Silva Santos',
                'cpf'         => '111.222.333-44',
                'parentesco'  => 'Cônjuge',
                'percentual'  => 60.00,
                'created'     => date('Y-m-d H:i:s'),
                'modified'    => date('Y-m-d H:i:s'),
            ],
            [
                'contrato_id' => 1,
                'nome'        => 'Pedro Silva Santos',
                'cpf'         => '222.333.444-55',
                'parentesco'  => 'Filho',
                'percentual'  => 40.00,
                'created'     => date('Y-m-d H:i:s'),
                'modified'    => date('Y-m-d H:i:s'),
            ],
            [
                'contrato_id' => 2,
                'nome'        => 'Roberto Oliveira Costa',
                'cpf'         => '333.444.555-66',
                'parentesco'  => 'Cônjuge',
                'percentual'  => 100.00,
                'created'     => date('Y-m-d H:i:s'),
                'modified'    => date('Y-m-d H:i:s'),
            ],
        ];

        $table = $this->table('beneficiarios');
        $table->insert($data)->save();
    }
}