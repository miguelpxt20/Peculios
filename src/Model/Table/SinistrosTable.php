<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class SinistrosTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('sinistros');
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
            ->scalar('tipo_evento')
            ->maxLength('tipo_evento', 30)
            ->requirePresence('tipo_evento', 'create')
            ->notEmptyString('tipo_evento', 'O tipo de evento é obrigatório.')
            ->add('tipo_evento', 'valido', [
                'rule' => ['inList', ['obito', 'invalidez', 'desligamento_voluntario']],
                'message' => 'Tipo de evento inválido.',
            ]);

        $validator
            ->date('data_evento')
            ->requirePresence('data_evento', 'create')
            ->notEmptyDate('data_evento', 'A data do evento é obrigatória.');

        $validator
            ->date('data_abertura')
            ->allowEmptyDate('data_abertura');

        $validator
            ->scalar('status')
            ->maxLength('status', 20)
            ->notEmptyString('status');

        $validator
            ->decimal('valor_calculado')
            ->allowEmptyString('valor_calculado');

        $validator
            ->scalar('observacao')
            ->allowEmptyString('observacao');

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