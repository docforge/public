<?php
/**
 * DocForge Template File.
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

<nav class="tm-navbar uk-navbar uk-navbar-attached">
    <div class="uk-container uk-container-center">

        <a href="/" class="uk-navbar-brand dw-navbar-brand uk-hidden-small">
            <i class="uk-icon-logo"></i>
            <?=$scope->getName()?>
        </a>

        <ul id="dw-navbar-menu" class="uk-navbar-nav uk-hidden-small">
            <?php foreach ($scope->listRootPages() as $page) { ?>
                <li>
                    <a <?=$page->isCurrent()||$page->isParentOfCurrent()?'class="active"':''?>
                            href="<?=$page->getUrl()?>">
                        <?=$page->getMenuLabel()?>
                    </a>
                </li>
            <?php } ?>
            <li>
                <div class="nav-search">
                    <div class="gcse-searchbox-only"></div>
                </div>
            </li>
        </ul>

        <a href="#tm-offcanvas" class="uk-navbar-toggle uk-visible-small" data-uk-offcanvas=""></a>

        <div class="uk-navbar-brand uk-navbar-center uk-visible-small">
            <a href="/" class="dw-navbar-brand"><i class="uk-icon-logo"></i> <?=$scope->getName()?>
            </a>
        </div>

    </div>

</nav>
