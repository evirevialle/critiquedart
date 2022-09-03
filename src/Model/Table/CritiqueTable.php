<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Critique Model
 *
 * @property \App\Model\Table\NumeroperiodiqueTable&\Cake\ORM\Association\BelongsTo $numeroperiodique
 * @property \App\Model\Table\OuvrageTable&\Cake\ORM\Association\BelongsTo $ouvrage
 * @property \App\Model\Table\SignatureTable&\Cake\ORM\Association\HasMany $signature
 * 
 * 
 * @method \App\Model\Entity\Critique newEmptyEntity()
 * @method \App\Model\Entity\Critique newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Critique[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Critique get($primaryKey, $options = [])
 * @method \App\Model\Entity\Critique findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Critique patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Critique[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Critique|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Critique saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Critique[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Critique[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Critique[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Critique[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class CritiqueTable extends Table
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

        $this->setTable('critique');
        $this->setDisplayField('pk_id_critique');
        $this->setPrimaryKey('pk_id_critique');

        $this->belongsTo('Numeroperiodique', [
            'foreignKey' => 'fk_id_numeroperiodique',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Ouvrage', [
            'foreignKey' => 'fk_id_ouvrage',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Signature', [
            'foreignKey' => 'fk_id_critique',
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
            ->integer('pk_id_critique')
            ->allowEmptyString('pk_id_critique', null, 'create');

        $validator
            ->scalar('titre')
            ->maxLength('titre', 255)
            ->requirePresence('titre', 'create')
            ->notEmptyString('titre');

        $validator
            ->scalar('complementTitre')
            ->maxLength('complementTitre', 255)
            ->allowEmptyString('complementTitre');

        $validator
            ->scalar('type')
            ->requirePresence('type', 'create')
            ->notEmptyString('type');

        $validator
            ->scalar('pagination')
            ->maxLength('pagination', 20)
            ->notEmptyString('pagination');

        $validator
            ->scalar('attribution')
            ->notEmptyString('attribution');

        $validator
            ->allowEmptyString('reedition');

        $validator
            ->integer('fk_id_ouvrage')
            ->allowEmptyString('fk_id_ouvrage');

        $validator
            ->integer('fk_id_numeroperiodique')
            ->allowEmptyString('fk_id_numeroperiodique');

        return $validator;
    }
}
