<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PlanosPeculioFixture
 */
class PlanosPeculioFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public string $table = 'planos_peculio';
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
                'codigo' => 'Lorem ipsum dolor ',
                'nome' => 'Lorem ipsum dolor sit amet',
                'descricao' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'tipo' => 'Lorem ipsum dolor ',
                'valor_cobertura' => 1.5,
                'percentual_contribuicao' => 1.5,
                'carencia_meses' => 1,
                'ativo' => 1,
                'created' => '2026-06-14 02:30:32',
                'modified' => '2026-06-14 02:30:32',
            ],
        ];
        parent::init();
    }
}
