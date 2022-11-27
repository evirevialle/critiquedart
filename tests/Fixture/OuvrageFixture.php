<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * OuvrageFixture
 */
class OuvrageFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'ouvrage';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'pk_id_ouvrage' => 1,
                'ISBN_10' => 'Lorem ipsum',
                'annee' => 1,
                'titre' => 'Lorem ipsum dolor sit amet',
                'complement_titre' => 'Lorem ipsum dolor sit amet',
                'coordonnateur' => 'Lorem ipsum dolor sit amet',
                'collection' => 'Lorem ipsum dolor sit amet',
                'edition' => 1,
                'fk_id_editeur' => 1,
            ],
        ];
        parent::init();
    }
}
