<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Compositionsignature Entity
 *
 * @property int $fk_id_signature
 * @property int $fk_id_critiquedart
 */
class Compositionsignature extends Entity
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
        '*' => true,
        'fk_id_signature' => false,
        'fk_id_critiquedart' => false,
    ];
}
