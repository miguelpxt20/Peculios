<?php
declare(strict_types=1);

use Migrations\BaseMigration;

class CreateBeneficiarios extends BaseMigration
{
    public function change(): void
    {
        $table = $this->table('beneficiarios');
        $table->addColumn('contrato_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('nome', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('cpf', 'string', [
            'default' => null,
            'limit' => 14,
            'null' => false,
        ]);
        $table->addColumn('parentesco', 'string', [
            'default' => null,
            'limit' => 50,
            'null' => false,
        ]);
        $table->addColumn('percentual', 'decimal', [
            'default' => null,
            'null' => false,
            'precision' => 5,
            'scale' => 2,
        ]);
        $table->addColumn('created', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('modified', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->addIndex(['contrato_id']);
        $table->create();
    }
}
