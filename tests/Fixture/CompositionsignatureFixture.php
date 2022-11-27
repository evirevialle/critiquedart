<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CompositionsignatureFixture
 */
class CompositionsignatureFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'compositionsignature';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'fk_id_signature' => 1,
                'fk_id_critiquedart' => 1,
            ],
        ];
        parent::init();
    }
}
