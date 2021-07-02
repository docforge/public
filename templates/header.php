<?php
/**
 * Handbook Template File.
 *
 * PHP version 7
 *
 * @category   Template
 *
 * @author     Francesco Bianco <bianco@javanile.org>
 * @license    https://goo.gl/KPZ2qI  MIT License
 * @copyright  2015-2020 Javanile
 */

$scope = $this->getScope();

?>
<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title><?=$scope->getName()?> | <?=$scope->getCurrentPage()->getLabel()?></title>
    <meta name="generator" content="VuePress 1.8.2">
    <meta name="author" content="<?=$scope->getAuthor()?>">
    <link rel="icon" href="/icon.png"><link rel='canonical' href='https://bricks.stefanobartoletti.it/theme/functions/'/>
    <meta name="description" content="Bricks WordPress starter theme custom functions.php">
    <meta name="theme-color" content="#37c871">
    <meta property="og:locale" content="en_US">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://bricks.stefanobartoletti.it/">
    <meta property="og:title" content="Bricks Documentation">
    <meta property="og:site_name" content="Bricks">
    <meta property="og:description" content="A modular WordPress starter theme powered by Bootstrap and Gulp">
    <meta property="og:image" content="https://bricks.stefanobartoletti.it/preview.png">
    <meta property="og:image:type" content="image/png">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@ste_bartoletti">
    <meta name="twitter:title" content="Bricks Documentation">
    <meta name="twitter:description" content="A modular WordPress starter theme powered by Bootstrap and Gulp">
    <meta name="twitter:image" content="https://bricks.stefanobartoletti.it/preview.png">
    <meta name="google-site-verification" content="snVUv6mUDur4MkL3CDDFGFDv7TPFm4vAk5BAfK-cDsw">

    <link rel="stylesheet" href="<?=$scope->getStyleCss()?>">
</head>
<body>
<div id="app" data-server-rendered="true">
    <div class="theme-container">
