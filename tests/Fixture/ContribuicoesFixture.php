<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ContribuicoesFixture
 */
class ContribuicoesFixture extends TestFixture
{
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
                'contrato_id' => 1,
                'competencia' => '2026-06-14',
                'valor' => 1.5,
                'status' => 'Lorem ipsum dolor ',
                'data_pagamento' => '2026-06-14',
                'created' => '2026-06-14 02:31:03',
                'modified' => '2026-06-14 02:31:03',
            ],
        ];
        parent::init();
    }
}
