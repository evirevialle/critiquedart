<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Signature Model
 * 
 * @property \App\Model\Table\PseudonymeTable&\Cake\ORM\Association\BelongsTo $pseudonyme
 * @property \App\Model\Table\CollectifTable&\Cake\ORM\Association\BelongsTo $collectif
 * @property \App\Model\Table\CritiqueTable&\Cake\ORM\Association\BelongsTo $critique
 * @property \App\Model\Table\CompositionsignatureTable&\Cake\ORM\Association\BelongsToMany $critiquedart
 * 
 *
 * @method \App\Model\Entity\Signature newEmptyEntity()
 * @method \App\Model\Entity\Signature newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Signature[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Signature get($primaryKey, $options = [])
 * @method \App\Model\Entity\Signature findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Signature patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Signature[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Signature|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Signature saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Signature[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Signature[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Signature[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Signature[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class SignatureTable extends Table
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

        $this->setTable('signature');
        $this->setDisplayField('pk_id_signature');
        $this->setPrimaryKey('pk_id_signature');

        $this->belongsTo('Pseudonyme', [
            'foreignKey' => 'fk_id_pseudonyme',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Collectif', [
            'foreignKey' => 'fk_id_collectif',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Critique', [
            'foreignKey' => 'fk_id_critique',
            'joinType' => 'INNER',
        ]);
        $this->belongsToMany('Critiquedart', [
            'foreignKey' => 'fk_id_signature',
            'targetForeignKey' => 'fk_id_critiquedart',
            'joinTable' => 'compositionsignature',
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
            ->integer('pk_id_signature')
            ->allowEmptyString('pk_id_signature', null, 'create');

        $validator
            ->scalar('type')
            ->notEmptyString('type');

        $validator
            ->integer('fk_id_pseudonyme')
            ->allowEmptyString('fk_id_pseudonyme');

        $validator
            ->integer('fk_id_collectif')
            ->allowEmptyString('fk_id_collectif');

        $validator
            ->integer('fk_id_critique')
            ->requirePresence('fk_id_critique', 'create')
            ->notEmptyString('fk_id_critique');

        return $validator;
    }
}
