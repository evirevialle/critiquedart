<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ToutesLesCritique Entity
 *
 * @property int $id_critique
 * @property string $titre
 * @property string|null $sous titre
 * @property string $type
 * @property int $id_auteur
 * @property string $nom
 * @property string|null $prenom
 * @property int|null $annee_ouvrage
 * @property string|null $coordonnateur
 * @property string|null $titre_ouvrage
 * @property int|null $annee_periodique
 * @property string|null $titre_periodique
 * @property string|null $ville
 */
class ToutesLesCritique extends Entity
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
        'id_critique' => true,
        'titre' => true,
        'sous titre' => true,
        'type' => true,
        'id_auteur' => true,
        'nom' => true,
        'prenom' => true,
        'annee_ouvrage' => true,
        'coordonnateur' => true,
        'titre_ouvrage' => true,
        'annee_periodique' => true,
        'titre_periodique' => true,
        'ville' => true,
    ];
}
