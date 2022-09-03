<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Periodique Model
 * 
 * @property \App\Model\Table\NumeroperiodiqueTable&\Cake\ORM\Association\HasMany $numeroperiodique
 *
 * @method \App\Model\Entity\Periodique newEmptyEntity()
 * @method \App\Model\Entity\Periodique newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Periodique[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Periodique get($primaryKey, $options = [])
 * @method \App\Model\Entity\Periodique findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Periodique patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Periodique[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Periodique|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Periodique saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Periodique[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Periodique[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Periodique[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Periodique[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class PeriodiqueTable extends Table
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

        $this->setTable('periodique');
        $this->setDisplayField('pk_id_periodique');
        $this->setPrimaryKey('pk_id_periodique');

        $this->hasMany('Numeroperiodique', [
            'foreignKey' => 'fk_id_periodique',
        ]);
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
            ->integer('pk_id_periodique')
            ->allowEmptyString('pk_id_periodique', null, 'create');

        $validator
            ->scalar('ISSN')
            ->maxLength('ISSN', 9)
            ->allowEmptyString('ISSN');

        $validator
            ->scalar('titre')
            ->maxLength('titre', 255)
            ->requirePresence('titre', 'create')
            ->notEmptyString('titre');

        $validator
            ->scalar('periodicite')
            ->allowEmptyString('periodicite');

        $validator
            ->scalar('couverture')
            ->maxLength('couverture', 9)
            ->allowEmptyString('couverture');

        return $validator;
    }
}
