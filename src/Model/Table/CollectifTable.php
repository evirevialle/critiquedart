<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Collectif Model
 * 
 * @property \App\Model\Table\CritiquedartTable&\Cake\ORM\Association\BelongsToMany $critiquedart
 * 
 * @method \App\Model\Entity\Collectif newEmptyEntity()
 * @method \App\Model\Entity\Collectif newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Collectif[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Collectif get($primaryKey, $options = [])
 * @method \App\Model\Entity\Collectif findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Collectif patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Collectif[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Collectif|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Collectif saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Collectif[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Collectif[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Collectif[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Collectif[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class CollectifTable extends Table
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

        $this->setTable('collectif');
        $this->setDisplayField('pk_id_collectif');
        $this->setPrimaryKey('pk_id_collectif');

        $this->belongsToMany('Critiquedart', [
            'foreignKey' => 'fk_id_collectif',
            'targetForeignKey' => 'fk_id_critiqueDart',
            'joinTable' => 'participationcollectif',
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
            ->integer('pk_id_collectif')
            ->allowEmptyString('pk_id_collectif', null, 'create');

        $validator
            ->scalar('titre')
            ->maxLength('titre', 255)
            ->allowEmptyString('titre');

        $validator
            ->scalar('auteursSecondaires')
            ->allowEmptyString('auteursSecondaires');

        return $validator;
    }
}
