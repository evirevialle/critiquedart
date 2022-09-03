<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PseudonymeFixture
 */
class PseudonymeFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'pseudonyme';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'pk_id_pseudonyme' => 1,
                'titre' => 'Lorem ipsum dolor sit amet',
                'utilisation' => 'Lorem ipsum dolor sit amet',
                'fk_id_critiqueDart_signataire' => 1,
                'fk_id_critiqueDart_depositaire' => 1,
            ],
        ];
        parent::init();
    }
}
