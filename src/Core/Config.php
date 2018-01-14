<?php
declare(strict_types=1);

namespace App\Core;

use \Symfony\Component\Filesystem\Exception\FileNotFoundException;

/**
 * Class Config
 * @package Core
 *
 * Load and work with configuration data.
 */
class Config implements ConfigInterface
{
    /** @var  string Pth to file with configuration data. */
    private $filename;

    /** @var  string Path to example configuration file. */
    private $exampleFilename;

    /** @var  array */
    private $config = [];

    /**
     * Config constructor.
     * @param string $filename
     * @param string $exampleFilename
     */
    public function __construct(string $filename, string $exampleFilename)
    {
        $this->filename = $filename;
        $this->exampleFilename = $exampleFilename;
        $this->load();
    }

    /**
     * Get config value.
     *
     * @param string $configName Name of config.
     * @param mixed  $default    Default value if the value is not exist in config.
     *
     * @return mixed
     */
    public function get(string $configName, $default = null)
    {
        return $this->config[$configName] ?? $default;
    }

    /**
     * Generate DSN string for DB connection.
     *
     * @return string
     */
    public function getDSN(): string
    {
        $driver = $this->get('db.driver');
        $host = $this->get('db.host');
        $port = $this->get('db.port');
        $user = $this->get('db.user');
        $password = $this->get('db.password');
        $database = $this->get('db.database');

        return "$driver:host=$host;port=$port;dbname=$database;user=$user;password=$password";
    }

    /**
     * Parse config file.
     */
    private function load()
    {
        if (!file_exists($this->filename)) {
            if (!file_exists($this->exampleFilename)) {
                throw new FileNotFoundException('Cannot find config file and example config file');
            }
            copy($this->exampleFilename, $this->filename);
        }
        $this->config = parse_ini_file($this->filename);
    }

}