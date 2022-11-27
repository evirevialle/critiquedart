<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ArticlesFixture
 */
class ArticlesFixture extends TestFixture
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
                'idCritiqueDart' => 1,
                'revue' => 'Lorem ipsum dolor sit amet',
                'ISSN' => 'Lorem i',
                'annee' => 1,
                'datePrecise' => '2022-10-11',
                'complementTitreNumero' => 'Lorem ipsum dolor sit amet',
                'volume' => 'Lorem ipsum do',
                'numero' => 1,
                'idCritique' => 1,
                'titreCritique' => 'Lorem ipsum dolor sit amet',
                'critiqueComplementTitre' => 'Lorem ipsum dolor sit amet',
                'typeCritique' => 'Lorem ipsum dolor sit amet',
                'pagination' => 'Lorem ipsum dolor ',
                'attribution' => 'Lorem ipsum dolor sit amet',
                'reedition' => 1,
                'idSignature' => 1,
                'typeSignature' => 'Lorem ipsum dolor sit amet',
                'idPseudonyme' => 1,
                'idCollectif' => 1,
                'idNumeroperiodique' => 1,
            ],
        ];
        parent::init();
    }
}
