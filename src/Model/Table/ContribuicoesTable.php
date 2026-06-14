<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class ContribuicoesTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('contribuicoes');
        $this->setDisplayField('status');
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
            ->date('competencia')
            ->requirePresence('competencia', 'create')
            ->notEmptyDate('competencia', 'A competência é obrigatória.');

        $validator
            ->decimal('valor')
            ->requirePresence('valor', 'create')
            ->notEmptyString('valor', 'O valor é obrigatório.');

        $validator
            ->scalar('status')
            ->maxLength('status', 20)
            ->notEmptyString('status', 'O status é obrigatório.')
            ->add('status', 'valido', [
                'rule' => ['inList', ['pendente', 'paga', 'atrasada', 'cancelada']],
                'message' => 'Status inválido.',
            ]);

        $validator
            ->date('data_pagamento')
            ->allowEmptyDate('data_pagamento');

        return $validator;
    }

    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->isUnique(['contrato_id', 'competencia']), [
            'errorField' => 'contrato_id',
            'message' => 'Já existe uma contribuição para este contrato nesta competência.',
        ]);
        $rules->add($rules->existsIn(['contrato_id'], 'ContratosPeculio'), [
            'errorField' => 'contrato_id',
        ]);

        return $rules;
    }
}