<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * SiteFixture
 */
class SiteFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'site';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'pk_id_site' => 1,
                'auteur' => 'Lorem ipsum dolor sit amet',
                'societe' => 'Lorem ipsum dolor sit amet',
                'institution' => 'Lorem ipsum dolor sit amet',
                'URL' => 'Lorem ipsum dolor sit amet',
                'fk_id_critiqueDart' => 1,
            ],
        ];
        parent::init();
    }
}
