<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CritiquesDeCollectif Model
 *
 * @method \App\Model\Entity\CritiquesDeCollectif newEmptyEntity()
 * @method \App\Model\Entity\CritiquesDeCollectif newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\CritiquesDeCollectif[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CritiquesDeCollectif get($primaryKey, $options = [])
 * @method \App\Model\Entity\CritiquesDeCollectif findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\CritiquesDeCollectif patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CritiquesDeCollectif[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\CritiquesDeCollectif|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CritiquesDeCollectif saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CritiquesDeCollectif[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\CritiquesDeCollectif[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\CritiquesDeCollectif[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\CritiquesDeCollectif[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class CritiquesDeCollectifTable extends Table
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

        $this->setTable('critiques_de_collectif');
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
            ->scalar('collectif')
            ->maxLength('collectif', 255)
            ->allowEmptyString('collectif');

        $validator
            ->scalar('membresCollectif')
            ->allowEmptyString('membresCollectif');

        $validator
            ->scalar('auteursSecondaires')
            ->allowEmptyString('auteursSecondaires');

        $validator
            ->scalar('titre')
            ->maxLength('titre', 4096)
            ->allowEmptyString('titre');

        $validator
            ->scalar('type')
            ->allowEmptyString('type');

        return $validator;
    }
}
