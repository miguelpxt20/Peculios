<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AssociadosTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AssociadosTable Test Case
 */
class AssociadosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\AssociadosTable
     */
    protected $Associados;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.Associados',
        'app.ContratosPeculio',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Associados') ? [] : ['className' => AssociadosTable::class];
        $this->Associados = $this->getTableLocator()->get('Associados', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Associados);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @link \App\Model\Table\AssociadosTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @link \App\Model\Table\AssociadosTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
