<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Chapitres Model
 * 
 * @property \App\Model\Table\EditeurTable&\Cake\ORM\Association\BelongsTo $editeur
 *
 * @method \App\Model\Entity\Chapitre newEmptyEntity()
 * @method \App\Model\Entity\Chapitre newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Chapitre[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Chapitre get($primaryKey, $options = [])
 * @method \App\Model\Entity\Chapitre findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Chapitre patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Chapitre[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Chapitre|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Chapitre saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Chapitre[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Chapitre[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Chapitre[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Chapitre[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class ChapitresTable extends Table
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

        $this->setTable('chapitres');
        $this->belongsTo('Editeur', [
            'foreignKey' => 'idEditeur',
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
            ->scalar('prenom')
            ->maxLength('prenom', 255)
            ->allowEmptyString('prenom');

        $validator
            ->scalar('nom')
            ->maxLength('nom', 255)
            ->requirePresence('nom', 'create')
            ->notEmptyString('nom');

        $validator
            ->allowEmptyString('annee');

        $validator
            ->scalar('ISBN')
            ->maxLength('ISBN', 13)
            ->allowEmptyString('ISBN');

        $validator
            ->scalar('collection')
            ->maxLength('collection', 128)
            ->allowEmptyString('collection');

        $validator
            ->integer('idCritique')
            ->notEmptyString('idCritique');

        $validator
            ->scalar('titre')
            ->maxLength('titre', 4096)
            ->requirePresence('titre', 'create')
            ->notEmptyString('titre');

        $validator
            ->scalar('ouvrageTitre')
            ->maxLength('ouvrageTitre', 512)
            ->requirePresence('ouvrageTitre', 'create')
            ->notEmptyString('ouvrageTitre');

        $validator
            ->scalar('ouvrageComplementTitre')
            ->maxLength('ouvrageComplementTitre', 512)
            ->allowEmptyString('ouvrageComplementTitre');

        $validator
            ->scalar('coordonnateur')
            ->maxLength('coordonnateur', 255)
            ->allowEmptyString('coordonnateur');

        $validator
            ->integer('idEditeur')
            ->allowEmptyString('idEditeur');

        $validator
            ->scalar('typeCritique')
            ->requirePresence('typeCritique', 'create')
            ->notEmptyString('typeCritique');

        $validator
            ->scalar('critiqueComplementTitre')
            ->maxLength('critiqueComplementTitre', 4096)
            ->allowEmptyString('critiqueComplementTitre');

        $validator
            ->integer('idCritiqueDart')
            ->requirePresence('idCritiqueDart', 'create')
            ->notEmptyString('idCritiqueDart');

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
            ->integer('idPseudo')
            ->allowEmptyString('idPseudo');

        $validator
            ->integer('idCollectif')
            ->allowEmptyString('idCollectif');

        $validator
            ->integer('idOuvrage')
            ->allowEmptyString('idOuvrage');

        return $validator;
    }
}
