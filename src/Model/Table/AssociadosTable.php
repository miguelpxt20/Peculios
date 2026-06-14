<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class AssociadosTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('associados');
        $this->setDisplayField('nome');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('ContratosPeculio', [
            'foreignKey' => 'associado_id',
        ]);
    }

    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->scalar('matricula')
            ->maxLength('matricula', 20)
            ->requirePresence('matricula', 'create')
            ->notEmptyString('matricula', 'A matrícula é obrigatória.');

        $validator
            ->scalar('nome')
            ->maxLength('nome', 255)
            ->requirePresence('nome', 'create')
            ->notEmptyString('nome', 'O nome é obrigatório.');

        $validator
            ->scalar('cpf')
            ->maxLength('cpf', 14)
            ->requirePresence('cpf', 'create')
            ->notEmptyString('cpf', 'O CPF é obrigatório.')
            ->add('cpf', 'formato', [
                'rule' => function ($value) {
                    return (bool)preg_match('/^\d{3}\.\d{3}\.\d{3}-\d{2}$/', $value);
                },
                'message' => 'CPF deve estar no formato 000.000.000-00.',
            ]);

        $validator
            ->scalar('patente')
            ->maxLength('patente', 100)
            ->requirePresence('patente', 'create')
            ->notEmptyString('patente', 'A patente é obrigatória.');

        $validator
            ->scalar('situacao')
            ->maxLength('situacao', 20)
            ->notEmptyString('situacao', 'A situação é obrigatória.')
            ->add('situacao', 'valido', [
                'rule' => ['inList', ['ativo', 'inativo', 'reserva', 'reformado']],
                'message' => 'Situação inválida.',
            ]);

        $validator
            ->date('data_ingresso')
            ->requirePresence('data_ingresso', 'create')
            ->notEmptyDate('data_ingresso', 'A data de ingresso é obrigatória.');

        $validator
            ->date('data_nascimento')
            ->requirePresence('data_nascimento', 'create')
            ->notEmptyDate('data_nascimento', 'A data de nascimento é obrigatória.');

        return $validator;
    }

    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->isUnique(['matricula']), ['errorField' => 'matricula', 'message' => 'Esta matrícula já está cadastrada.']);
        $rules->add($rules->isUnique(['cpf']), ['errorField' => 'cpf', 'message' => 'Este CPF já está cadastrado.']);

        return $rules;
    }
}