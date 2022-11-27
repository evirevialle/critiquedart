<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Collection Entity
 *
 * @property string|null $collection
 * @property int|null $date_min
 * @property int|null $data_max
 * @property int $nombre_ouvrages
 */
class Collection extends Entity
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
        'collection' => true,
        'date_min' => true,
        'data_max' => true,
        'nombre_ouvrages' => true,
    ];
}
