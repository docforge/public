<?php
/**
 * DocForge Serve.
 *
 * PHP version 7
 *
 * @category   Script
 *
 * @author     Francesco Bianco <bianco@javanile.org>
 * @license    https://goo.gl/KPZ2qI  MIT License
 * @copyright  2015-2020 Javanile
 */

$scope = $this->getScope();

?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="<?=$scope->getAuthor()?>">
        <meta name="description" content="">
        <title><?=$scope->getName()?> | <?=$scope->getCurrentPage()->getLabel()?></title>
        <link rel="stylesheet" href="<?=$scope->getStyleCss()?>">
    </head>
    <body class="tm-background">
