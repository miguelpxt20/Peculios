<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class BeneficiariosTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('beneficiarios');
        $this->setDisplayField('nome');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('ContratosPeculio', [
            'foreignKey' => 'contrato_id',
            'joinType' => 'INNER',
        ]);
    }

    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('contrato_id')
            ->requirePresence('contrato_id', 'create')
            ->notEmptyString('contrato_id', 'O contrato é obrigatório.');

        $validator
            ->scalar('nome')
            ->maxLength('nome', 255)
            ->requirePresence('nome', 'create')
            ->notEmptyString('nome', 'O nome é obrigatório.');

        $validator
            ->scalar('cpf')
            ->maxLength('cpf', 14)
            ->requirePresence('cpf', 'create')
            ->notEmptyString('cpf', 'O CPF é obrigatório.');

        $validator
            ->scalar('parentesco')
            ->maxLength('parentesco', 50)
            ->requirePresence('parentesco', 'create')
            ->notEmptyString('parentesco', 'O parentesco é obrigatório.');

        $validator
            ->decimal('percentual')
            ->requirePresence('percentual', 'create')
            ->notEmptyString('percentual', 'O percentual é obrigatório.');

        return $validator;
    }

    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn(['contrato_id'], 'ContratosPeculio'), [
            'errorField' => 'contrato_id',
        ]);

        return $rules;
    }
}