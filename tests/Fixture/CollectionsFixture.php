<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CollectionsFixture
 */
class CollectionsFixture extends TestFixture
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
                'collection' => 'Lorem ipsum dolor sit amet',
                'date_min' => 1,
                'data_max' => 1,
                'nombre_ouvrages' => 1,
            ],
        ];
        parent::init();
    }
}
