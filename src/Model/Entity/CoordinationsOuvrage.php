<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CoordinationsOuvrage Entity
 *
 * @property int $pk_id_ouvrage
 * @property string|null $ISBN_10
 * @property int|null $annee
 * @property string $titre
 * @property string|null $complement_titre
 * @property string|null $coordonnateur
 * @property string|null $collection
 * @property int|null $edition
 * @property int|null $fk_id_editeur
 */
class CoordinationsOuvrage extends Entity
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
        'pk_id_ouvrage' => true,
        'ISBN_10' => true,
        'annee' => true,
        'titre' => true,
        'complement_titre' => true,
        'coordonnateur' => true,
        'collection' => true,
        'edition' => true,
        'fk_id_editeur' => true,
    ];
}
