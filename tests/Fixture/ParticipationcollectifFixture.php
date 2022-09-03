<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ParticipationcollectifFixture
 */
class ParticipationcollectifFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'participationcollectif';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'pk_id_participation' => 1,
                'fk_id_critiqueDart' => 1,
                'fk_id_collectif' => 1,
            ],
        ];
        parent::init();
    }
}
