<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Secondaire Entity
 *
 * @property int $pk_id_Secondaire
 * @property string|null $Auteur
 * @property string|null $Critiquedart
 * @property string|null $Direction_d_ouvrage
 * @property string|null $Titre
 * @property string|null $Type_de_texte
 * @property string|null $Institution
 * @property string|null $Annee
 * @property string|null $Page
 * @property string|null $Type
 * @property string|null $URL
 * @property int|null $fk_id_critiqueDart
 */
class Secondaire extends Entity
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
        'Auteur' => true,
        'Critiquedart' => true,
        'Direction_d_ouvrage' => true,
        'Titre' => true,
        'Type_de_texte' => true,
        'Institution' => true,
        'Annee' => true,
        'Page' => true,
        'Type' => true,
        'URL' => true,
        'fk_id_critiqueDart' => true,
    ];
}
