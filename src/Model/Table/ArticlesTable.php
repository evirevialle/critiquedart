<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Articles Model
 *
 * @method \App\Model\Entity\Article newEmptyEntity()
 * @method \App\Model\Entity\Article newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Article[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Article get($primaryKey, $options = [])
 * @method \App\Model\Entity\Article findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Article patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Article[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Article|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Article saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Article[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Article[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Article[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Article[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class ArticlesTable extends Table
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

        $this->setTable('articles');
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
            ->scalar('prenom')
            ->maxLength('prenom', 255)
            ->allowEmptyString('prenom');

        $validator
            ->scalar('nom')
            ->maxLength('nom', 255)
            ->requirePresence('nom', 'create')
            ->notEmptyString('nom');

        $validator
            ->integer('idCritiqueDart')
            ->requirePresence('idCritiqueDart', 'create')
            ->notEmptyString('idCritiqueDart');

        $validator
            ->scalar('revue')
            ->maxLength('revue', 255)
            ->requirePresence('revue', 'create')
            ->notEmptyString('revue');

        $validator
            ->scalar('ISSN')
            ->maxLength('ISSN', 9)
            ->allowEmptyString('ISSN');

        $validator
            ->allowEmptyString('annee');

        $validator
            ->date('datePrecise')
            ->allowEmptyDate('datePrecise');

        $validator
            ->scalar('complementTitreNumero')
            ->maxLength('complementTitreNumero', 256)
            ->allowEmptyString('complementTitreNumero');

        $validator
            ->scalar('volume')
            ->maxLength('volume', 16)
            ->allowEmptyString('volume');

        $validator
            ->integer('numero')
            ->allowEmptyString('numero');

        $validator
            ->integer('idCritique')
            ->notEmptyString('idCritique');

        $validator
            ->scalar('titreCritique')
            ->maxLength('titreCritique', 4096)
            ->requirePresence('titreCritique', 'create')
            ->notEmptyString('titreCritique');

        $validator
            ->scalar('critiqueComplementTitre')
            ->maxLength('critiqueComplementTitre', 4096)
            ->allowEmptyString('critiqueComplementTitre');

        $validator
            ->scalar('typeCritique')
            ->requirePresence('typeCritique', 'create')
            ->notEmptyString('typeCritique');

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
            ->integer('idSignature')
            ->notEmptyString('idSignature');

        $validator
            ->scalar('typeSignature')
            ->notEmptyString('typeSignature');

        $validator
            ->integer('idPseudonyme')
            ->allowEmptyString('idPseudonyme');

        $validator
            ->integer('idCollectif')
            ->allowEmptyString('idCollectif');

        $validator
            ->integer('idNumeroperiodique')
            ->allowEmptyString('idNumeroperiodique');

        return $validator;
    }
}
