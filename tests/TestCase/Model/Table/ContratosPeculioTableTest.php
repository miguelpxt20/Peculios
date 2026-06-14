<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ContratosPeculioTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ContratosPeculioTable Test Case
 */
class ContratosPeculioTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ContratosPeculioTable
     */
    protected $ContratosPeculio;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.ContratosPeculio',
        'app.Associados',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('ContratosPeculio') ? [] : ['className' => ContratosPeculioTable::class];
        $this->ContratosPeculio = $this->getTableLocator()->get('ContratosPeculio', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->ContratosPeculio);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @link \App\Model\Table\ContratosPeculioTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @link \App\Model\Table\ContratosPeculioTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
