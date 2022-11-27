<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CoordinationsOuvrages Model
 * 
 * @property \App\Model\Table\EditeurTable&\Cake\ORM\Association\BelongsTo $editeur
 *
 * @method \App\Model\Entity\CoordinationsOuvrage newEmptyEntity()
 * @method \App\Model\Entity\CoordinationsOuvrage newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\CoordinationsOuvrage[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CoordinationsOuvrage get($primaryKey, $options = [])
 * @method \App\Model\Entity\CoordinationsOuvrage findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\CoordinationsOuvrage patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CoordinationsOuvrage[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\CoordinationsOuvrage|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CoordinationsOuvrage saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CoordinationsOuvrage[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\CoordinationsOuvrage[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\CoordinationsOuvrage[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\CoordinationsOuvrage[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class CoordinationsOuvragesTable extends Table
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

        $this->setTable('coordinations_ouvrages');
        $this->belongsTo('Editeur', [
            'foreignKey' => 'fk_id_editeur',
            'joinType' => 'LEFT',
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
            ->notEmptyString('pk_id_ouvrage');

        $validator
            ->scalar('ISBN_10')
            ->maxLength('ISBN_10', 13)
            ->allowEmptyString('ISBN_10');

        $validator
            ->allowEmptyString('annee');

        $validator
            ->scalar('titre')
            ->maxLength('titre', 512)
            ->requirePresence('titre', 'create')
            ->notEmptyString('titre');

        $validator
            ->scalar('complement_titre')
            ->maxLength('complement_titre', 512)
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
