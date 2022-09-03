<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Participationcollectif Model
 *
 * @method \App\Model\Entity\Participationcollectif newEmptyEntity()
 * @method \App\Model\Entity\Participationcollectif newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Participationcollectif[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Participationcollectif get($primaryKey, $options = [])
 * @method \App\Model\Entity\Participationcollectif findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Participationcollectif patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Participationcollectif[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Participationcollectif|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Participationcollectif saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Participationcollectif[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Participationcollectif[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Participationcollectif[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Participationcollectif[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class ParticipationcollectifTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('participationcollectif');
        $this->setDisplayField('pk_id_participation');
        $this->setPrimaryKey('pk_id_participation');
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
            ->integer('pk_id_participation')
            ->allowEmptyString('pk_id_participation', null, 'create');

        $validator
            ->integer('fk_id_critiqueDart')
            ->requirePresence('fk_id_critiqueDart', 'create')
            ->notEmptyString('fk_id_critiqueDart');

        $validator
            ->integer('fk_id_collectif')
            ->requirePresence('fk_id_collectif', 'create')
            ->notEmptyString('fk_id_collectif');

        return $validator;
    }
}
