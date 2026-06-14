<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * AssociadosFixture
 */
class AssociadosFixture extends TestFixture
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
                'matricula' => 'Lorem ipsum dolor ',
                'nome' => 'Lorem ipsum dolor sit amet',
                'cpf' => 'Lorem ipsum ',
                'patente' => 'Lorem ipsum dolor sit amet',
                'situacao' => 'Lorem ipsum dolor ',
                'data_ingresso' => '2026-06-14',
                'data_nascimento' => '2026-06-14',
                'created' => '2026-06-14 02:29:47',
                'modified' => '2026-06-14 02:29:47',
            ],
        ];
        parent::init();
    }
}
