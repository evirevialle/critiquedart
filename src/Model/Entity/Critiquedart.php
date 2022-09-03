<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Critiquedart Entity
 *
 * @property int $pk_id_critiqueDart
 * @property string $nom
 * @property string|null $prenom
 * @property int|null $anneeNaissance
 * @property int|null $anneeMort
 * @property string|null $ISNI
 * @property string $initiales
 * @property string|null $URL_WP
 */
class Critiquedart extends Entity
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
        'nom' => true,
        'prenom' => true,
        'anneeNaissance' => true,
        'anneeMort' => true,
        'ISNI' => true,
        'initiales' => true,
        'URL_WP' => true,
    ];
}
