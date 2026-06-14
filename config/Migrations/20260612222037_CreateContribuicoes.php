<?php
declare(strict_types=1);

use Migrations\BaseMigration;

class CreateContribuicoes extends BaseMigration
{
    public function change(): void
    {
        $table = $this->table('contribuicoes');
        $table->addColumn('contrato_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('competencia', 'date', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('valor', 'decimal', [
            'default' => null,
            'null' => false,
            'precision' => 15,
            'scale' => 2,
        ]);
        $table->addColumn('status', 'string', [
            'default' => 'pendente',
            'limit' => 20,
            'null' => false,
        ]);
        $table->addColumn('data_pagamento', 'date', [
            'default' => null,
            'null' => true,
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
        $table->addIndex(['competencia']);
        $table->addIndex(['contrato_id', 'competencia'], ['unique' => true]);
        $table->create();
    }
}