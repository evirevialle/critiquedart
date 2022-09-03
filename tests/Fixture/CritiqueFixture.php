<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CritiqueFixture
 */
class CritiqueFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'critique';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'pk_id_critique' => 1,
                'titre' => 'Lorem ipsum dolor sit amet',
                'complementTitre' => 'Lorem ipsum dolor sit amet',
                'type' => 'Lorem ipsum dolor sit amet',
                'pagination' => 'Lorem ipsum dolor ',
                'attribution' => 'Lorem ipsum dolor sit amet',
                'reedition' => 1,
                'fk_id_ouvrage' => 1,
                'fk_id_numeroperiodique' => 1,
            ],
        ];
        parent::init();
    }
}
