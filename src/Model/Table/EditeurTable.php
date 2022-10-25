<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Editeur Model
 * 
 * @property \App\Model\Table\OuvrageTable&\Cake\ORM\Association\HasMany $ouvrage
 *
 * @method \App\Model\Entity\Editeur newEmptyEntity()
 * @method \App\Model\Entity\Editeur newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Editeur[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Editeur get($primaryKey, $options = [])
 * @method \App\Model\Entity\Editeur findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Editeur patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Editeur[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Editeur|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Editeur saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Editeur[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Editeur[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Editeur[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Editeur[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class EditeurTable extends Table
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

        $this->setTable('editeur');
        $this->setDisplayField('pk_id_editeur');
        $this->setPrimaryKey('pk_id_editeur');

        $this->hasMany('Ouvrage', [
            'foreignKey' => 'fk_id_editeur',
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
            ->integer('pk_id_editeur')
            ->allowEmptyString('pk_id_editeur', null, 'create');

        $validator
            ->scalar('nom')
            ->maxLength('nom', 128)
            ->requirePresence('nom', 'create')
            ->notEmptyString('nom');

        $validator
            ->scalar('ville')
            ->maxLength('ville', 128)
            ->allowEmptyString('ville');

        return $validator;
    }
}
