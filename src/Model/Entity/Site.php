<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Site Entity
 *
 * @property int $pk_id_site
 * @property string|null $auteur
 * @property string|null $societe
 * @property string|null $institution
 * @property string|null $URL
 * @property int $fk_id_critiqueDart
 */
class Site extends Entity
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
        'auteur' => true,
        'societe' => true,
        'institution' => true,
        'URL' => true,
        'fk_id_critiqueDart' => true,
    ];
}
