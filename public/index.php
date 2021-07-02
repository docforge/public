<?php
/**
 * DocForge.
 *
 * PHP version 7
 *
 * @category   Script
 *
 * @author     Francesco Bianco <bianco@javanile.org>
 * @license    https://goo.gl/KPZ2qI  MIT License
 * @copyright  2015-2020 Javanile
 */

require_once __DIR__.'/../vendor/autoload.php';

use Javanile\Handbook\Server;

$configName = 'handbook.config.php';

$configPaths = [
    getcwd(),
    __DIR__.'/../../../..',
    __DIR__.'/..'
];

foreach ($configPaths as $path) {
    if (file_exists($configFile = $path . '/' . $configName)) {
        error_log('Config file: '.$configFile , 4);
        $config = include $configFile;
        require_once empty($config['custom-autoload']) ? $path . '/vendor/autoload.php' : $config['custom-autoload'];
        break;
    }
}

echo (new Server($config, __DIR__ . '/..'))->run();
