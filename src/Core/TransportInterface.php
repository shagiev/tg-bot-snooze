<?php
declare(strict_types=1);

namespace App\Core;

use App\Model\Update;

/**
 * Created by PhpStorm.
 * User: lenar
 * Date: 04.01.18
 * Time: 6:25
 */
interface TransportInterface
{
    /**
     * TransportInterface constructor.
     * @param ConfigInterface $config
     */
    public function __construct(ConfigInterface $config);

    /**
     * Get new messages and updates from Transport.
     * @return Update
     */
    public function getUpdates(): Update;
}