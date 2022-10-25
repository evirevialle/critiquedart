<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PrefacesFixture
 */
class PrefacesFixture extends TestFixture
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
                'prenom' => 'Lorem ipsum dolor sit amet',
                'nom' => 'Lorem ipsum dolor sit amet',
                'annee' => 1,
                'ISBN' => 'Lorem ipsum',
                'collection' => 'Lorem ipsum dolor sit amet',
                'idCritique' => 1,
                'titre' => 'Lorem ipsum dolor sit amet',
                'ouvrageTitre' => 'Lorem ipsum dolor sit amet',
                'ouvrageComplementTitre' => 'Lorem ipsum dolor sit amet',
                'coordonnateur' => 'Lorem ipsum dolor sit amet',
                'idEditeur' => 1,
                'typeCritique' => 'Lorem ipsum dolor sit amet',
                'critiqueComplementTitre' => 'Lorem ipsum dolor sit amet',
                'idCritiqueDart' => 1,
                'pagination' => 'Lorem ipsum dolor ',
                'attribution' => 'Lorem ipsum dolor sit amet',
                'reedition' => 1,
                'idSignature' => 1,
                'typeSignature' => 'Lorem ipsum dolor sit amet',
                'idPseudo' => 1,
                'idCollectif' => 1,
                'idOuvrage' => 1,
            ],
        ];
        parent::init();
    }
}
