<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ContribuicoesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ContribuicoesTable Test Case
 */
class ContribuicoesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ContribuicoesTable
     */
    protected $Contribuicoes;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.Contribuicoes',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Contribuicoes') ? [] : ['className' => ContribuicoesTable::class];
        $this->Contribuicoes = $this->getTableLocator()->get('Contribuicoes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Contribuicoes);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @link \App\Model\Table\ContribuicoesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @link \App\Model\Table\ContribuicoesTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
