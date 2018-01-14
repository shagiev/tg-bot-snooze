<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: lenar
 * Date: 04.01.18
 * Time: 6:20
 */

namespace App\Core;

use \App\Transport\TransportInterface;

/**
 * Class Application
 * @package Core
 */
class Application
{
    /** @var ConfigInterface config object */
    private $config;
    /** @var DBInterface db object */
    private $database;

    /** @var  TransportInterface[] */
    private $transports = [];

    /**
     * ApplicationInterface constructor.
     */
    public function __construct(ConfigInterface $config, DBInterface $database)
    {
        $this->config = $config;
        $this->database = $database;
    }

    /**
     * Add new Transport channel.
     *
     * @param TransportInterface $transport
     * @return void
     */
    public function addTransport(TransportInterface $transport)
    {
        $this->transports[] = $transport;
    }

    /**
     * @return DBInterface
     */
    public function getDB(): DBInterface
    {
        return $this->database;
    }

    /**
     * Run work of application.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->transports as $transport) {
            $transport->getUpdates(); }
    }
}