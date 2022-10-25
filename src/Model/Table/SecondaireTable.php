<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Secondaire Model
 * 
 * @property \App\Model\Table\CritiquedartTable&CakeORM\Association\BelongsTo $critiquedart
 *
 * @method \App\Model\Entity\Secondaire newEmptyEntity()
 * @method \App\Model\Entity\Secondaire newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Secondaire[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Secondaire get($primaryKey, $options = [])
 * @method \App\Model\Entity\Secondaire findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Secondaire patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Secondaire[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Secondaire|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Secondaire saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Secondaire[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Secondaire[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Secondaire[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Secondaire[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class SecondaireTable extends Table
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

        $this->setTable('secondaire');
        $this->setDisplayField('pk_id_Secondaire');
        $this->setPrimaryKey('pk_id_Secondaire');

        $this->belongsTo('Critiquedart', [
            'foreignKey' => 'fk_id_critiqueDart',
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
            ->integer('pk_id_Secondaire')
            ->allowEmptyString('pk_id_Secondaire', null, 'create');

        $validator
            ->scalar('Auteur')
            ->maxLength('Auteur', 120)
            ->allowEmptyString('Auteur');

        $validator
            ->scalar('Critiquedart')
            ->maxLength('Critiquedart', 500)
            ->allowEmptyString('Critiquedart');

        $validator
            ->scalar('Direction_d_ouvrage')
            ->maxLength('Direction_d_ouvrage', 500)
            ->allowEmptyString('Direction_d_ouvrage');

        $validator
            ->scalar('Titre')
            ->maxLength('Titre', 500)
            ->allowEmptyString('Titre');

        $validator
            ->scalar('Type_de_texte')
            ->maxLength('Type_de_texte', 500)
            ->allowEmptyString('Type_de_texte');

        $validator
            ->scalar('Institution')
            ->maxLength('Institution', 500)
            ->allowEmptyString('Institution');

        $validator
            ->scalar('Annee')
            ->maxLength('Annee', 500)
            ->allowEmptyString('Annee');

        $validator
            ->scalar('Page')
            ->maxLength('Page', 500)
            ->allowEmptyString('Page');

        $validator
            ->scalar('Type')
            ->maxLength('Type', 500)
            ->allowEmptyString('Type');

        $validator
            ->scalar('URL')
            ->maxLength('URL', 500)
            ->allowEmptyString('URL');

        $validator
            ->integer('fk_id_critiqueDart')
            ->allowEmptyString('fk_id_critiqueDart');

        return $validator;
    }
}
