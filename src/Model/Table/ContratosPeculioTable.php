<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class ContratosPeculioTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('contratos_peculio');
        $this->setDisplayField('numero_contrato');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Associados', [
            'foreignKey' => 'associado_id',
            'joinType' => 'INNER',
        ]);

        $this->belongsTo('PlanosPeculio', [
            'foreignKey' => 'plano_id',
            'joinType' => 'INNER',
        ]);

        $this->hasMany('Beneficiarios', [
            'foreignKey' => 'contrato_id',
        ]);

        $this->hasMany('Contribuicoes', [
            'foreignKey' => 'contrato_id',
        ]);

        $this->hasMany('Sinistros', [
            'foreignKey' => 'contrato_id',
        ]);
    }

    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('associado_id')
            ->notEmptyString('associado_id', 'O associado é obrigatório.');

        $validator
            ->integer('plano_id')
            ->requirePresence('plano_id', 'create')
            ->notEmptyString('plano_id', 'O plano é obrigatório.');

        $validator
            ->scalar('numero_contrato')
            ->maxLength('numero_contrato', 30)
            ->requirePresence('numero_contrato', 'create')
            ->notEmptyString('numero_contrato', 'O número do contrato é obrigatório.');

        $validator
            ->date('data_inicio')
            ->requirePresence('data_inicio', 'create')
            ->notEmptyDate('data_inicio', 'A data de início é obrigatória.');

        $validator
            ->date('data_fim')
            ->allowEmptyDate('data_fim');

        $validator
            ->scalar('status')
            ->maxLength('status', 20)
            ->notEmptyString('status', 'O status é obrigatório.')
            ->add('status', 'valido', [
                'rule' => ['inList', ['vigente', 'suspenso', 'encerrado', 'sinistrado']],
                'message' => 'Status inválido.',
            ]);

        return $validator;
    }

    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->isUnique(['numero_contrato']), ['errorField' => 'numero_contrato', 'message' => 'Este número de contrato já existe.']);
        $rules->add($rules->existsIn(['associado_id'], 'Associados'), ['errorField' => 'associado_id']);
        $rules->add($rules->existsIn(['plano_id'], 'PlanosPeculio'), ['errorField' => 'plano_id']);

        return $rules;
    }
}