<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: lenar
 * Date: 04.01.18
 * Time: 6:12
 */

namespace App\Core;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;


/**
 * Class DIContainer
 * @package Core
 */
class DIContainer
{
    /** @var ContainerBuilder container */
    private $container;

    /** @var YamlFileLoader file loader */
    private $loader;

    /**
     * DIContainer constructor.
     */
    public function __construct(string $configFilename)
    {
        $this->container = new ContainerBuilder();
        $this->loader = new YamlFileLoader($this->container, new FileLocator(dirname(__DIR__)));
        $this->loader->load($configFilename);
    }

    /**
     * Get service.
     *
     * @param string $serviceName name of service.
     *
     * @return object
     */
    public function get($serviceName)
    {
        return $this->container->get($serviceName);
    }
}