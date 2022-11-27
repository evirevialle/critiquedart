<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Signature Entity
 *
 * @property int $pk_id_signature
 * @property string $type
 * @property int|null $fk_id_pseudonyme
 * @property int|null $fk_id_collectif
 * @property int $fk_id_critique
 */
class Signature extends Entity
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
        'type' => true,
        'fk_id_pseudonyme' => true,
        'fk_id_collectif' => true,
        'fk_id_critique' => true,
    ];
}
