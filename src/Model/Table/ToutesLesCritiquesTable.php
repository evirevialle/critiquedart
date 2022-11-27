<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ToutesLesCritiques Model
 *
 * @method \App\Model\Entity\ToutesLesCritique newEmptyEntity()
 * @method \App\Model\Entity\ToutesLesCritique newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\ToutesLesCritique[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ToutesLesCritique get($primaryKey, $options = [])
 * @method \App\Model\Entity\ToutesLesCritique findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\ToutesLesCritique patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ToutesLesCritique[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\ToutesLesCritique|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ToutesLesCritique saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ToutesLesCritique[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\ToutesLesCritique[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\ToutesLesCritique[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\ToutesLesCritique[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class ToutesLesCritiquesTable extends Table
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

        $this->setTable('toutes_les_critiques');
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
            ->integer('id_critique')
            ->notEmptyString('id_critique');

        $validator
            ->scalar('titre')
            ->maxLength('titre', 4096)
            ->requirePresence('titre', 'create')
            ->notEmptyString('titre');

        $validator
            ->scalar('sous titre')
            ->maxLength('sous titre', 4096)
            ->allowEmptyString('sous titre');

        $validator
            ->scalar('type')
            ->requirePresence('type', 'create')
            ->notEmptyString('type');

        $validator
            ->integer('id_auteur')
            ->requirePresence('id_auteur', 'create')
            ->notEmptyString('id_auteur');

        $validator
            ->scalar('nom')
            ->maxLength('nom', 255)
            ->requirePresence('nom', 'create')
            ->notEmptyString('nom');

        $validator
            ->scalar('prenom')
            ->maxLength('prenom', 255)
            ->allowEmptyString('prenom');

        $validator
            ->allowEmptyString('annee_ouvrage');

        $validator
            ->scalar('coordonnateur')
            ->maxLength('coordonnateur', 255)
            ->allowEmptyString('coordonnateur');

        $validator
            ->scalar('titre_ouvrage')
            ->maxLength('titre_ouvrage', 512)
            ->allowEmptyString('titre_ouvrage');

        $validator
            ->allowEmptyString('annee_periodique');

        $validator
            ->scalar('titre_periodique')
            ->maxLength('titre_periodique', 255)
            ->allowEmptyString('titre_periodique');

        $validator
            ->scalar('ville')
            ->maxLength('ville', 128)
            ->allowEmptyString('ville');

        return $validator;
    }
}
