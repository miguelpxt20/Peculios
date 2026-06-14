<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Contribuicoes Model
 *
 * @method \App\Model\Entity\Contribuico newEmptyEntity()
 * @method \App\Model\Entity\Contribuico newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Contribuico> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Contribuico get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Contribuico findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Contribuico patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Contribuico> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Contribuico|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Contribuico saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Contribuico>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Contribuico>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Contribuico>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Contribuico> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Contribuico>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Contribuico>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Contribuico>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Contribuico> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ContribuicoesTable extends Table
{
    /**
     * Initialize method
     *
     * @param array<string, mixed> $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('contribuicoes');
        $this->setDisplayField('status');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('contrato_id')
            ->requirePresence('contrato_id', 'create')
            ->notEmptyString('contrato_id');

        $validator
            ->date('competencia')
            ->requirePresence('competencia', 'create')
            ->notEmptyDate('competencia');

        $validator
            ->decimal('valor')
            ->requirePresence('valor', 'create')
            ->notEmptyString('valor');

        $validator
            ->scalar('status')
            ->maxLength('status', 20)
            ->notEmptyString('status');

        $validator
            ->date('data_pagamento')
            ->allowEmptyDate('data_pagamento');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->isUnique(['contrato_id', 'competencia']), ['errorField' => 'contrato_id', 'message' => __('This combination of contrato_id and competencia already exists')]);

        return $rules;
    }
}
