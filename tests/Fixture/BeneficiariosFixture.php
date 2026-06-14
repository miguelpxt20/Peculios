<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * BeneficiariosFixture
 */
class BeneficiariosFixture extends TestFixture
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
                'nome' => 'Lorem ipsum dolor sit amet',
                'cpf' => 'Lorem ipsum ',
                'parentesco' => 'Lorem ipsum dolor sit amet',
                'percentual' => 1.5,
                'created' => '2026-06-14 02:30:51',
                'modified' => '2026-06-14 02:30:51',
            ],
        ];
        parent::init();
    }
}
