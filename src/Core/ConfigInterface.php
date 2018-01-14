<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: lenar
 * Date: 03.01.18
 * Time: 14:09
 */

namespace App\Core;

/**
 * Interface ConfigInterface
 * @package Core
 */
interface ConfigInterface
{
    /**
     * ConfigInterface constructor.
     *
     * @param string $filename
     * @param string $exampleFilename
     */
    public function __construct(string $filename, string $exampleFilename);

    /**
     * Get config value.
     *
     * @param string $name    config name.
     * @param mixed  $default default value if config is not isset.
     *
     * @return mixed
     */
    public function get(string $name, $default = null);

    /**
     * Return DSN string for database connection.
     *
     * @return string
     */
    public function getDSN(): string;

}