<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Ouvrage Model
 *
 * @property \App\Model\Table\EditeurTable&\Cake\ORM\Association\BelongsTo $editeur
 * @property \App\Model\Table\CritiqueTable&\Cake\ORM\Association\HasMany $critique
 * 
 * @method \App\Model\Entity\Ouvrage newEmptyEntity()
 * @method \App\Model\Entity\Ouvrage newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Ouvrage[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Ouvrage get($primaryKey, $options = [])
 * @method \App\Model\Entity\Ouvrage findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Ouvrage patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Ouvrage[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Ouvrage|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Ouvrage saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Ouvrage[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Ouvrage[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Ouvrage[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Ouvrage[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class OuvrageTable extends Table
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

        $this->setTable('ouvrage');
        $this->setDisplayField('pk_id_ouvrage');
        $this->setPrimaryKey('pk_id_ouvrage');

        $this->belongsTo('Editeur', [
            'foreignKey' => 'fk_id_editeur',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Critique', [
            'foreignKey' => 'fk_id_ouvrage',
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
            ->integer('pk_id_ouvrage')
            ->allowEmptyString('pk_id_ouvrage', null, 'create');

        $validator
            ->scalar('ISBN_10')
            ->maxLength('ISBN_10', 13)
            ->allowEmptyString('ISBN_10');

        $validator
            ->allowEmptyString('annee');

        $validator
            ->scalar('titre')
            ->maxLength('titre', 255)
            ->requirePresence('titre', 'create')
            ->notEmptyString('titre');

        $validator
            ->scalar('complement_titre')
            ->maxLength('complement_titre', 255)
            ->allowEmptyString('complement_titre');

        $validator
            ->scalar('coordonnateur')
            ->maxLength('coordonnateur', 255)
            ->allowEmptyString('coordonnateur');

        $validator
            ->scalar('collection')
            ->maxLength('collection', 128)
            ->allowEmptyString('collection');

        $validator
            ->allowEmptyString('edition');

        $validator
            ->integer('fk_id_editeur')
            ->allowEmptyString('fk_id_editeur');

        return $validator;
    }
}
