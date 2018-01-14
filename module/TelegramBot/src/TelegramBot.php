<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: lenar
 * Date: 04.01.18
 * Time: 6:34
 */

namespace TelegramBot;

use App\Core\ConfigInterface;
use App\Core\TransportInterface;
use Longman\TelegramBot\Telegram as LongmanTelegram;
use App\Model\Update;

/**
 * Class Telegram
 * @package Transport
 */
class TelegramBotAdapter implements TransportInterface
{
    /** @var LongmanTelegram */
    private $telegram;

    /** @var ConfigInterface config object */
    private $config;

    /**
     * Telegram constructor.
     * @param ConfigInterface $config
     */
    public function __construct(ConfigInterface $config)
    {
        $this->config = $config;
        $this->telegram = new LongmanTelegram(
            $config->get('telegram_bot.api_key'),
            $config->get('telegram_bot.username')
        );
    }

    /**
     * Out telegram bot uses database to save messages and other information.
     *
     * @param \PDO $pdo
     */
    public function setPDO(\PDO $pdo)
    {
        $this->telegram->enableExternalMySql($pdo, $this->config->get('telegram_bot.table_prefix'));
    }

    /**
     * Get new messages and updates from Transport.
     * @return Update
     * @throws \Exception
     */
    public function getUpdates(): Update
    {
        try {
            // Handle telegram getUpdates request
            $response = $this->telegram->handleGetUpdates();
            if (!$response->getOk()) {
                throw new \Exception($response->printError(true));
            }

            /** @var \Longman\TelegramBot\Entities\Update[] $updates */
            $updates = $response->getResult();
            echo "result count: " . count($updates) . "\n";

            foreach ($updates as $update) {
                var_dump($update);
            }

        } catch (\Longman\TelegramBot\Exception\TelegramException $e) {
            echo 'Troubles: '. $e->getMessage();
        }
    }
}