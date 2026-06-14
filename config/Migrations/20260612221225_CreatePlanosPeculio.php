<?php
declare(strict_types=1);

use Migrations\BaseMigration;

class CreatePlanosPeculio extends BaseMigration
{
    public function change(): void
    {
        $table = $this->table('planos_peculio');
        
        $table->addColumn('codigo', 'string', [
            'default' => null,
            'limit' => 20,
            'null' => false,
            
            
        ]);
        $table->addColumn('nome', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('descricao', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('tipo', 'string', [
            'default' => null,
            'limit' => 20,
            'null' => false,
        ]);
        $table->addColumn('valor_cobertura', 'decimal', [
            'default' => null,
            'null' => false,
            'precision' => 15,
            'scale' => 2,
        ]);
        $table->addColumn('percentual_contribuicao', 'decimal', [
            'default' => null,
            'null' => false,
            'precision' => 5,
            'scale' => 4,
        ]);
        $table->addColumn('carencia_meses', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('ativo', 'boolean', [
            'default' => true,
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
        $table->addIndex(['codigo'], ['unique' => true]);
        $table->create();
    }
}