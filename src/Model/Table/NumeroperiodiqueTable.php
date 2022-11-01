<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Numeroperiodique Model
 * 
 * @property \App\Model\Table\PeriodiqueTable&\Cake\ORM\Association\BelongsTo $periodique
 * @property \App\Model\Table\CritiqueTable&\Cake\ORM\Association\HasMany $critique
 *
 * @method \App\Model\Entity\Numeroperiodique newEmptyEntity()
 * @method \App\Model\Entity\Numeroperiodique newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Numeroperiodique[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Numeroperiodique get($primaryKey, $options = [])
 * @method \App\Model\Entity\Numeroperiodique findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Numeroperiodique patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Numeroperiodique[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Numeroperiodique|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Numeroperiodique saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Numeroperiodique[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Numeroperiodique[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Numeroperiodique[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Numeroperiodique[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class NumeroperiodiqueTable extends Table
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

        $this->setTable('numeroperiodique');
        $this->setDisplayField('pk_id_numero_periodique');
        $this->setPrimaryKey('pk_id_numero_periodique');

        $this->hasMany('Critique', [
            'foreignKey' => 'fk_id_numeroperiodique',
        ]);
        $this->belongsTo('Periodique', [
            'foreignKey' => 'fk_id_periodique',
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
            ->integer('pk_id_numero_periodique')
            ->allowEmptyString('pk_id_numero_periodique', null, 'create');

        $validator
            ->allowEmptyString('numero');

        $validator
            ->allowEmptyString('annee');

        $validator
            ->allowEmptyString('nb_pages');

        $validator
            ->scalar('titre')
            ->maxLength('titre', 255)
            ->allowEmptyString('titre');

        $validator
            ->scalar('complementTitre')
            ->maxLength('complementTitre', 256)
            ->allowEmptyString('complementTitre');

        $validator
            ->scalar('volume')
            ->maxLength('volume', 16)
            ->allowEmptyString('volume');

        $validator
            ->scalar('dateprecise')
            ->maxLength('dateprecise', 10)
            ->allowEmptyString('dateprecise');

        $validator
            ->integer('fk_id_periodique')
            ->requirePresence('fk_id_periodique', 'create')
            ->notEmptyString('fk_id_periodique');

        return $validator;
    }
}
