<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ToutesLesCritiquesFixture
 */
class ToutesLesCritiquesFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id_critique' => 1,
                'titre' => 'Lorem ipsum dolor sit amet',
                'sous titre' => 'Lorem ipsum dolor sit amet',
                'type' => 'Lorem ipsum dolor sit amet',
                'id_auteur' => 1,
                'nom' => 'Lorem ipsum dolor sit amet',
                'prenom' => 'Lorem ipsum dolor sit amet',
                'annee_ouvrage' => 1,
                'coordonnateur' => 'Lorem ipsum dolor sit amet',
                'titre_ouvrage' => 'Lorem ipsum dolor sit amet',
                'annee_periodique' => 1,
                'titre_periodique' => 'Lorem ipsum dolor sit amet',
                'ville' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
