<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * SinistrosFixture
 */
class SinistrosFixture extends TestFixture
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
                'tipo_evento' => 'Lorem ipsum dolor sit amet',
                'data_evento' => '2026-06-14',
                'data_abertura' => '2026-06-14',
                'status' => 'Lorem ipsum dolor ',
                'valor_calculado' => 1.5,
                'observacao' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'created' => '2026-06-14 02:31:22',
                'modified' => '2026-06-14 02:31:22',
            ],
        ];
        parent::init();
    }
}
