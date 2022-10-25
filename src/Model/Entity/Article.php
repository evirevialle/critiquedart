<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Article Entity
 *
 * @property string|null $prenom
 * @property string $nom
 * @property int $idCritiqueDart
 * @property string $revue
 * @property string|null $ISSN
 * @property int|null $annee
 * @property \Cake\I18n\FrozenDate|null $datePrecise
 * @property string|null $complementTitreNumero
 * @property string|null $volume
 * @property int|null $numero
 * @property int $idCritique
 * @property string $titreCritique
 * @property string|null $critiqueComplementTitre
 * @property string $typeCritique
 * @property string $pagination
 * @property string $attribution
 * @property int|null $reedition
 * @property int $idSignature
 * @property string $typeSignature
 * @property int|null $idPseudonyme
 * @property int|null $idCollectif
 * @property int|null $idNumeroperiodique
 */
class Article extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'prenom' => true,
        'nom' => true,
        'idCritiqueDart' => true,
        'revue' => true,
        'ISSN' => true,
        'annee' => true,
        'datePrecise' => true,
        'complementTitreNumero' => true,
        'volume' => true,
        'numero' => true,
        'idCritique' => true,
        'titreCritique' => true,
        'critiqueComplementTitre' => true,
        'typeCritique' => true,
        'pagination' => true,
        'attribution' => true,
        'reedition' => true,
        'idSignature' => true,
        'typeSignature' => true,
        'idPseudonyme' => true,
        'idCollectif' => true,
        'idNumeroperiodique' => true,
    ];
}
