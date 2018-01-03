<?php
declare(strict_types=1);

namespace Core;


/**
 * Class Config
 * @package Core
 *
 * Load and work with configuration data.
 */
class Config
{
    /** @var  string Pth to file with configuration data. */
    private $filename;

    /** @var  string Path to example configuration file. */
    private $exampleFilename;

    /** @var  array */
    private $config = [];

    /**
     * Config constructor.
     * @param $filename
     * @param $exampleFilename
     */
    public function __construct($filename, $exampleFilename)
    {
        $this->filename = $filename;
        $this->exampleFilename = $exampleFilename;
        $this->load();
    }

    /**
     * Parse config file.
     */
    private function load()
    {
        if (!file_exists($this->filename)) {
            copy($this->exampleFilename, $this->filename);
        }
        $this->config = parse_ini_file($this->filename);
    }

    /**
     * Get config value.
     *
     * @param string $configName Name of config.
     * @param mixed  $default    Default value if the value is not exist in config.
     *
     * @return mixed
     */
    public function get($configName, $default = null)
    {
        return isset($this->config[$configName]) ?? $default;
    }
}