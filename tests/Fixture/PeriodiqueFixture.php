<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PeriodiqueFixture
 */
class PeriodiqueFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'periodique';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'pk_id_periodique' => 1,
                'ISSN' => 'Lorem i',
                'titre' => 'Lorem ipsum dolor sit amet',
                'periodicite' => 'Lorem ipsum dolor sit amet',
                'couverture' => 'Lorem i',
            ],
        ];
        parent::init();
    }
}
