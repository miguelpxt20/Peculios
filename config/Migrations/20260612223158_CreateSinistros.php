<?php
declare(strict_types=1);

use Migrations\BaseMigration;

class CreateSinistros extends BaseMigration
{
    public function change(): void
    {
        $table = $this->table('sinistros');
        $table->addColumn('contrato_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('tipo_evento', 'string', [
            'default' => null,
            'limit' => 30,
            'null' => false,
        ]);
        $table->addColumn('data_evento', 'date', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('data_abertura', 'date', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('status', 'string', [
            'default' => 'aberto',
            'limit' => 20,
            'null' => false,
        ]);
        $table->addColumn('valor_calculado', 'decimal', [
            'default' => null,
            'null' => true,
            'precision' => 15,
            'scale' => 2,
        ]);
        $table->addColumn('observacao', 'text', [
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
        $table->create();
    }
}
