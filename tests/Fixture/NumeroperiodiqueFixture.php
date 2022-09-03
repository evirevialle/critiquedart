<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * NumeroperiodiqueFixture
 */
class NumeroperiodiqueFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'numeroperiodique';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'pk_id_numero_periodique' => 1,
                'numero' => 1,
                'annee' => 1,
                'nb_pages' => 1,
                'titre' => 'Lorem ipsum dolor sit amet',
                'complementTitre' => 'Lorem ipsum dolor sit amet',
                'volume' => 'Lorem ipsum do',
                'dateprecise' => 'Lorem ip',
                'fk_id_periodique' => 1,
            ],
        ];
        parent::init();
    }
}
