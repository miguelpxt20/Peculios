<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Sinistros Model
 *
 * @method \App\Model\Entity\Sinistro newEmptyEntity()
 * @method \App\Model\Entity\Sinistro newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Sinistro> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Sinistro get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Sinistro findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Sinistro patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Sinistro> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Sinistro|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Sinistro saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Sinistro>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Sinistro>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Sinistro>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Sinistro> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Sinistro>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Sinistro>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Sinistro>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Sinistro> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class SinistrosTable extends Table
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

        $this->setTable('sinistros');
        $this->setDisplayField('tipo_evento');
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
            ->scalar('tipo_evento')
            ->maxLength('tipo_evento', 30)
            ->requirePresence('tipo_evento', 'create')
            ->notEmptyString('tipo_evento');

        $validator
            ->date('data_evento')
            ->requirePresence('data_evento', 'create')
            ->notEmptyDate('data_evento');

        $validator
            ->date('data_abertura')
            ->requirePresence('data_abertura', 'create')
            ->notEmptyDate('data_abertura');

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
}
