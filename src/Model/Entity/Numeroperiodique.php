<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Numeroperiodique Entity
 *
 * @property int $pk_id_numero_periodique
 * @property int|null $numero
 * @property int|null $annee
 * @property int|null $nb_pages
 * @property string|null $titre
 * @property string|null $complementTitre
 * @property string|null $volume
 * @property string|null $dateprecise
 * @property int $fk_id_periodique
 */
class Numeroperiodique extends Entity
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
        'numero' => true,
        'annee' => true,
        'nb_pages' => true,
        'titre' => true,
        'complementTitre' => true,
        'volume' => true,
        'dateprecise' => true,
        'fk_id_periodique' => true,
    ];
}
