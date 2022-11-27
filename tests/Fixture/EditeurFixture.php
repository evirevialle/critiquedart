<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * EditeurFixture
 */
class EditeurFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'editeur';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'pk_id_editeur' => 1,
                'nom' => 'Lorem ipsum dolor sit amet',
                'ville' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
