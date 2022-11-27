<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * SecondaireFixture
 */
class SecondaireFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'secondaire';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'pk_id_Secondaire' => 1,
                'Auteur' => 'Lorem ipsum dolor sit amet',
                'Critiquedart' => 'Lorem ipsum dolor sit amet',
                'Direction_d_ouvrage' => 'Lorem ipsum dolor sit amet',
                'Titre' => 'Lorem ipsum dolor sit amet',
                'Type_de_texte' => 'Lorem ipsum dolor sit amet',
                'Institution' => 'Lorem ipsum dolor sit amet',
                'Annee' => 'Lorem ipsum dolor sit amet',
                'Page' => 'Lorem ipsum dolor sit amet',
                'Type' => 'Lorem ipsum dolor sit amet',
                'URL' => 'Lorem ipsum dolor sit amet',
                'fk_id_critiqueDart' => 1,
            ],
        ];
        parent::init();
    }
}
