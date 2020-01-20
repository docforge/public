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

$file = 'docforge.config.php';

foreach ([__DIR__.'/../../../..', __DIR__.'/..'] as $dir) {
    if (file_exists($dir . '/' . $file)) {
        $config = include $dir . '/' . $file;
        require_once empty($config['autoload']) ? $dir . '/vendor/autoload.php' : $config['autoload'];
        break;
    }
}

echo (new \DocForge\Framework\Server($config, __DIR__ . '/..'))->run();
