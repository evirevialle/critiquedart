<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Pseudonyme Entity
 *
 * @property int $pk_id_pseudonyme
 * @property string $titre
 * @property string $utilisation
 * @property int $fk_id_critiqueDart_signataire
 * @property int|null $fk_id_critiqueDart_depositaire
 */
class Pseudonyme extends Entity
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
        'utilisation' => true,
        'fk_id_critiqueDart_signataire' => true,
        'fk_id_critiqueDart_depositaire' => true,
    ];
}
