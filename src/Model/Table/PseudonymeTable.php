<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Pseudonyme Model
 * 
 * @property \App\Model\Table\CritiquedartTable&\Cake\ORM\Association\BelongsTo $critiquedart
 * @property \App\Model\Table\SignatureTable&\Cake\ORM\Association\HasMany $signature
 *
 * @method \App\Model\Entity\Pseudonyme newEmptyEntity()
 * @method \App\Model\Entity\Pseudonyme newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Pseudonyme[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Pseudonyme get($primaryKey, $options = [])
 * @method \App\Model\Entity\Pseudonyme findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Pseudonyme patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Pseudonyme[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Pseudonyme|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Pseudonyme saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Pseudonyme[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Pseudonyme[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Pseudonyme[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Pseudonyme[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class PseudonymeTable extends Table
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

        $this->setTable('pseudonyme');
        $this->setDisplayField('pk_id_pseudonyme');
        $this->setPrimaryKey('pk_id_pseudonyme');

        $this->hasMany('Signature', [
            'foreignKey' => 'fk_id_pseudonyme',
        ]);
        $this->belongsTo('Critiquedart', [
            'foreignKey' => 'fk_id_critiqueDart_depositaire',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Critiquedart', [
            'foreignKey' => 'fk_id_critiqueDart_signataire',
            'joinType' => 'INNER',
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
            ->integer('pk_id_pseudonyme')
            ->allowEmptyString('pk_id_pseudonyme', null, 'create');

        $validator
            ->scalar('titre')
            ->maxLength('titre', 255)
            ->requirePresence('titre', 'create')
            ->notEmptyString('titre');

        $validator
            ->scalar('utilisation')
            ->notEmptyString('utilisation');

        $validator
            ->integer('fk_id_critiqueDart_signataire')
            ->requirePresence('fk_id_critiqueDart_signataire', 'create')
            ->notEmptyString('fk_id_critiqueDart_signataire');

        $validator
            ->integer('fk_id_critiqueDart_depositaire')
            ->allowEmptyString('fk_id_critiqueDart_depositaire');

        return $validator;
    }
}
