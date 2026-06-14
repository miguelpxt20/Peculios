<?php
declare(strict_types=1);

use Migrations\BaseSeed;

class CreateContratosPeculio extends BaseSeed
{
    public function change(): void
    {
        $table = $this->table('contratos_peculio');
        $table->addColumn('associado_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('plano_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('numero_contrato', 'string', [
            'default' => null,
            'limit' => 30,
            'null' => false,
        ]);
        $table->addColumn('data_inicio', 'date', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('data_fim', 'date', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('status', 'string', [
            'default' => 'vigente',
            'limit' => 20,
            'null' => false,
        ]);
        $table->addColumn('created', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('modified', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->addIndex(['numero_contrato'], ['unique' => true]);
        $table->addIndex(['associado_id']);
        $table->addIndex(['plano_id']);
        $table->create();
    }
}