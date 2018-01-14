<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: lenar
 * Date: 07.01.18
 * Time: 0:16
 */

namespace Tests\Service;

use App\Core\Config;
use App\Core\DB;
use App\Core\DBInterface;
use PHPUnit\Framework\TestCase;

/**
 * Class AbstractMapperTestCase
 * @package Tests\Mapper
 */
abstract class AbstractServiceTestCase extends TestCase
{
    /** @var  DBInterface */
    protected $database;

    /**
     * Add database
     */
    public function setUp()
    {
        parent::setUp();

        $this->database = new DB($_ENV['TEST_DB_DSN'], $_ENV['TEST_DB_USER'], $_ENV['TEST_DB_PASS']);
    }
}
