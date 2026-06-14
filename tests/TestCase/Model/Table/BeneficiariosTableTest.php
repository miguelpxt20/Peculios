<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BeneficiariosTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BeneficiariosTable Test Case
 */
class BeneficiariosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\BeneficiariosTable
     */
    protected $Beneficiarios;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.Beneficiarios',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Beneficiarios') ? [] : ['className' => BeneficiariosTable::class];
        $this->Beneficiarios = $this->getTableLocator()->get('Beneficiarios', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Beneficiarios);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @link \App\Model\Table\BeneficiariosTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
