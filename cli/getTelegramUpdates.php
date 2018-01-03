<?php
declare(strict_types=1);

require dirname(__DIR__) . '/vendor/autoload.php';

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

$container = new ContainerBuilder();
$loader = new YamlFileLoader($container, new FileLocator(dirname(__DIR__)));
$loader->load('services.yaml');

$config = $container->get('config');

try {
    $telegram = new Longman\TelegramBot\Telegram(
        $config->get('telegram_bot.api_key'),
        $config->get('telegram_bot.username')
    );

    $telegram->enableMySql([
        'host'     => $config->get('mysql.host'),
        'user'     => $config->get('mysql.user'),
        'password' => $config->get('mysql.password'),
        'database' => $config->get('mysql.database'),
    ]);

    // Handle telegram getUpdates request
    $telegram->handleGetUpdates();
} catch (Longman\TelegramBot\Exception\TelegramException $e) {
    echo 'Troubles: '. $e->getMessage();
}
