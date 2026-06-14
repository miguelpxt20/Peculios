<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PlanosPeculioTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PlanosPeculioTable Test Case
 */
class PlanosPeculioTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PlanosPeculioTable
     */
    protected $PlanosPeculio;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.PlanosPeculio',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('PlanosPeculio') ? [] : ['className' => PlanosPeculioTable::class];
        $this->PlanosPeculio = $this->getTableLocator()->get('PlanosPeculio', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->PlanosPeculio);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @link \App\Model\Table\PlanosPeculioTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @link \App\Model\Table\PlanosPeculioTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
