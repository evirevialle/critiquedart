<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Compositionsignature Model
 * 
 * @property \App\Model\Table\SignatureTable&\Cake\ORM\Association\BelongsTo $signature
 * @property \App\Model\Table\CritiquedartTable&\Cake\ORM\Association\BelongsTo $critiquedart
 * 
 *
 * @method \App\Model\Entity\Compositionsignature newEmptyEntity()
 * @method \App\Model\Entity\Compositionsignature newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Compositionsignature[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Compositionsignature get($primaryKey, $options = [])
 * @method \App\Model\Entity\Compositionsignature findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Compositionsignature patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Compositionsignature[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Compositionsignature|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Compositionsignature saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Compositionsignature[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Compositionsignature[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Compositionsignature[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Compositionsignature[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class CompositionsignatureTable extends Table
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

        $this->setTable('compositionsignature');
        $this->setDisplayField(['fk_id_signature', 'fk_id_critiquedart']);
        $this->setPrimaryKey(['fk_id_signature', 'fk_id_critiquedart']);

        $this->belongsTo('Signature', [
            'foreignKey' => 'fk_id_signature',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Critiquedart', [
            'foreignKey' => 'fk_id_critiquedart',
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
            ->integer('fk_id_signature')
            ->allowEmptyString('fk_id_signature', null, 'create');

        $validator
            ->integer('fk_id_critiquedart')
            ->allowEmptyString('fk_id_critiquedart', null, 'create');

        return $validator;
    }
}
