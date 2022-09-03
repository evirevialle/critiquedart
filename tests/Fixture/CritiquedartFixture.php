<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CritiquedartFixture
 */
class CritiquedartFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'critiquedart';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'pk_id_critiqueDart' => 1,
                'nom' => 'Lorem ipsum dolor sit amet',
                'prenom' => 'Lorem ipsum dolor sit amet',
                'anneeNaissance' => 1,
                'anneeMort' => 1,
                'ISNI' => 'Lorem ipsum dolor',
                'initiales' => 'Lorem ip',
                'URL_WP' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
