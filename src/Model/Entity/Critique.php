<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Critique Entity
 *
 * @property int $pk_id_critique
 * @property string $titre
 * @property string|null $complementTitre
 * @property string $type
 * @property string $pagination
 * @property string $attribution
 * @property int|null $reedition
 * @property int|null $fk_id_ouvrage
 * @property int|null $fk_id_numeroperiodique
 */
class Critique extends Entity
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
        'titre' => true,
        'complementTitre' => true,
        'type' => true,
        'pagination' => true,
        'attribution' => true,
        'reedition' => true,
        'fk_id_ouvrage' => true,
        'fk_id_numeroperiodique' => true,
    ];
}
