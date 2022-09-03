<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Periodique Entity
 *
 * @property int $pk_id_periodique
 * @property string|null $ISSN
 * @property string $titre
 * @property string|null $periodicite
 * @property string|null $couverture
 */
class Periodique extends Entity
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
        'ISSN' => true,
        'titre' => true,
        'periodicite' => true,
        'couverture' => true,
    ];
}
