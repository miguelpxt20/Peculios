<?php
declare(strict_types=1);

use Migrations\BaseMigration;

class CreateAssociados extends BaseMigration
{
    public function change(): void
    {
        $table = $this->table('associados');
        $table->addColumn('matricula', 'string', [
            'limit' => 20,
            'null' => false,
        ]);
        $table->addColumn('nome', 'string', [
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('cpf', 'string', [
            'limit' => 14,
            'null' => false,
        ]);
        $table->addColumn('patente', 'string', [
            'limit' => 100,
            'null' => false,
        ]);
        $table->addColumn('situacao', 'string', [
            'limit' => 20,
            'null' => false,
            'default' => 'ativo',
        ]);
        $table->addColumn('data_ingresso', 'date', [
            'null' => false,
        ]);
        $table->addColumn('data_nascimento', 'date', [
            'null' => false,
        ]);
        $table->addColumn('created', 'datetime', [
            'null' => false,
        ]);
        $table->addColumn('modified', 'datetime', [
            'null' => false,
        ]);
        $table->addIndex(['matricula'], ['unique' => true]);
        $table->addIndex(['cpf'], ['unique' => true]);
        $table->create();
    }
}
