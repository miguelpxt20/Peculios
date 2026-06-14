<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PlanosPeculio Model
 *
 * @method \App\Model\Entity\PlanosPeculio newEmptyEntity()
 * @method \App\Model\Entity\PlanosPeculio newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\PlanosPeculio> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PlanosPeculio get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\PlanosPeculio findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\PlanosPeculio patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\PlanosPeculio> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\PlanosPeculio|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\PlanosPeculio saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\PlanosPeculio>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\PlanosPeculio>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\PlanosPeculio>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\PlanosPeculio> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\PlanosPeculio>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\PlanosPeculio>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\PlanosPeculio>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\PlanosPeculio> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PlanosPeculioTable extends Table
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

        $this->setTable('planos_peculio');
        $this->setDisplayField('codigo');
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
            ->scalar('codigo')
            ->maxLength('codigo', 20)
            ->requirePresence('codigo', 'create')
            ->notEmptyString('codigo')
            ->add('codigo', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('nome')
            ->maxLength('nome', 255)
            ->requirePresence('nome', 'create')
            ->notEmptyString('nome');

        $validator
            ->scalar('descricao')
            ->allowEmptyString('descricao');

        $validator
            ->scalar('tipo')
            ->maxLength('tipo', 20)
            ->requirePresence('tipo', 'create')
            ->notEmptyString('tipo');

        $validator
            ->decimal('valor_cobertura')
            ->requirePresence('valor_cobertura', 'create')
            ->notEmptyString('valor_cobertura');

        $validator
            ->decimal('percentual_contribuicao')
            ->requirePresence('percentual_contribuicao', 'create')
            ->notEmptyString('percentual_contribuicao');

        $validator
            ->integer('carencia_meses')
            ->requirePresence('carencia_meses', 'create')
            ->notEmptyString('carencia_meses');

        $validator
            ->boolean('ativo')
            ->notEmptyString('ativo');

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
        $rules->add($rules->isUnique(['codigo']), ['errorField' => 'codigo']);

        return $rules;
    }
}
