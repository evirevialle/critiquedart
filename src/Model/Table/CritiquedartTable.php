<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Critiquedart Model
 *
 * @property \App\Model\Table\PseudonymeTable&\Cake\ORM\Association\HasMany $pseudonyme
 * @property \App\Model\Table\SignatureTable&\Cake\ORM\Association\BelongsToMany $signature
 * @property \App\Model\Table\CollectifTable&\Cake\ORM\Association\BelongsToMany $collectif
 * 
 * @method \App\Model\Entity\Critiquedart newEmptyEntity()
 * @method \App\Model\Entity\Critiquedart newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Critiquedart[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Critiquedart get($primaryKey, $options = [])
 * @method \App\Model\Entity\Critiquedart findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Critiquedart patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Critiquedart[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Critiquedart|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Critiquedart saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Critiquedart[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Critiquedart[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Critiquedart[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Critiquedart[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class CritiquedartTable extends Table
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

        $this->setTable('critiquedart');
        $this->setDisplayField('pk_id_critiqueDart');
        $this->setPrimaryKey('pk_id_critiqueDart');

        $this->hasMany('Pseudonyme', [
            'foreignKey' => 'fk_id_critiqueDart_depositaire',
        ]);
        $this->hasMany('Pseudonyme', [
            'foreignKey' => 'fk_id_critiqueDart_signataire',
        ]);
        $this->belongsToMany('Signature', [
            'foreignKey' => 'fk_id_critiquedart',
            'targetForeignKey' => 'fk_id_signature',
            'joinTable' => 'compositionsignature',
        ]);

        $this->belongsToMany('Collectif',[
            'foreignKey' => 'fk_id_critiqueDart',
            'targetForeignKey' => 'fk_id_collectif',
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
            ->integer('pk_id_critiqueDart')
            ->allowEmptyString('pk_id_critiqueDart', null, 'create');

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
            ->allowEmptyString('anneeNaissance');

        $validator
            ->allowEmptyString('anneeMort');

        $validator
            ->scalar('ISNI')
            ->maxLength('ISNI', 19)
            ->allowEmptyString('ISNI');

        $validator
            ->scalar('initiales')
            ->maxLength('initiales', 10)
            ->requirePresence('initiales', 'create')
            ->notEmptyString('initiales');

        $validator
            ->scalar('URL_WP')
            ->maxLength('URL_WP', 255)
            ->allowEmptyString('URL_WP');

        return $validator;
    }
}
