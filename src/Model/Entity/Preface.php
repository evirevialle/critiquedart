<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Preface Entity
 *
 * @property string|null $prenom
 * @property string $nom
 * @property int|null $annee
 * @property string|null $ISBN
 * @property string|null $collection
 * @property int $idCritique
 * @property string $titre
 * @property string $ouvrageTitre
 * @property string|null $ouvrageComplementTitre
 * @property string|null $coordonnateur
 * @property int|null $idEditeur
 * @property string $typeCritique
 * @property string|null $critiqueComplementTitre
 * @property int $idCritiqueDart
 * @property string $pagination
 * @property string $attribution
 * @property int|null $reedition
 * @property int $idSignature
 * @property string $typeSignature
 * @property int|null $idPseudo
 * @property int|null $idCollectif
 * @property int|null $idOuvrage
 */
class Preface extends Entity
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
        'annee' => true,
        'ISBN' => true,
        'collection' => true,
        'idCritique' => true,
        'titre' => true,
        'ouvrageTitre' => true,
        'ouvrageComplementTitre' => true,
        'coordonnateur' => true,
        'idEditeur' => true,
        'typeCritique' => true,
        'critiqueComplementTitre' => true,
        'idCritiqueDart' => true,
        'pagination' => true,
        'attribution' => true,
        'reedition' => true,
        'idSignature' => true,
        'typeSignature' => true,
        'idPseudo' => true,
        'idCollectif' => true,
        'idOuvrage' => true,
    ];
}
