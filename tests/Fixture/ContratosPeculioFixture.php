<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ContratosPeculioFixture
 */
class ContratosPeculioFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public string $table = 'contratos_peculio';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'associado_id' => 1,
                'plano_id' => 1,
                'numero_contrato' => 'Lorem ipsum dolor sit amet',
                'data_inicio' => '2026-06-14',
                'data_fim' => '2026-06-14',
                'status' => 'Lorem ipsum dolor ',
                'created' => '2026-06-14 02:30:40',
                'modified' => '2026-06-14 02:30:40',
            ],
        ];
        parent::init();
    }
}
