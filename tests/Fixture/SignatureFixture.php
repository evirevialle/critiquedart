<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * SignatureFixture
 */
class SignatureFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'signature';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'pk_id_signature' => 1,
                'type' => 'Lorem ipsum dolor sit amet',
                'fk_id_pseudonyme' => 1,
                'fk_id_collectif' => 1,
                'fk_id_critique' => 1,
            ],
        ];
        parent::init();
    }
}
