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
$currentRootPage = $scope->getCurrentRootPage();
?>

<div class="sidebar-mask"></div>

<aside class="sidebar">
    <nav class="nav-links">
        <?php foreach ($scope->listRootPages() as $page) { ?>
            <div class="nav-item">
                <a href="<?=$page->getUrl()?>" class="nav-link <?=$page->isCurrent()||$page->isParentOfCurrent()?'router-link-active':''?>">
                    <?=$page->getMenuLabel()?>
                </a>
            </div>
        <?php } ?>
    </nav>

    <ul class="sidebar-links">
        <?php if (!$currentRootPage->hasSubPages()) { ?>
            <?php if ($scope->hasNonTerminalRootPages()) { ?>
                <?php foreach ($scope->listNonTerminalRootPages() as $page) { ?>
                    <li class="uk-nav-header"><?=$page->getLabel()?></li>
                    <?php foreach ($page->listSubPages() as $subPage) { ?>
                        <li>
                            <a <?=$subPage->isCurrent()?'class="active"':''?> href="<?=$subPage->getUrl()?>">
                                <?=$subPage->getMenuLabel()?>
                            </a>
                        </li>
                    <?php } ?>
                <?php } ?>
            <?php } elseif ($scope->hasTerminalRootPages()) { ?>
                <li class="uk-nav-header">Menu</li>
                <?php foreach ($scope->listTerminalRootPages() as $page) { ?>
                    <li>
                        <a <?=$page->isCurrent()?'class="active"':''?> href="<?=$page->getUrl()?>">
                            <?=$page->getMenuLabel()?>
                        </a>
                    </li>
                <?php } ?>
            <?php } ?>
        <?php } ?>

        <?php if ($currentRootPage->hasTerminalSubPages()) { ?>
            <li class="uk-nav-header"><?=$currentRootPage->getLabel()?></li>
            <?php foreach ($currentRootPage->listTerminalSubPages() as $page) { ?>
                <li>
                    <a <?=$page->isCurrent()?'class="active"':''?> href="<?=$page->getUrl()?>">
                        <?=$page->getMenuLabel()?>
                    </a>
                </li>
            <?php } ?>
        <?php } ?>

        <?php if ($currentRootPage->hasNonTerminalSubPages()) { ?>
            <?php foreach ($currentRootPage->listNonterminalSubpages() as $page) { ?>
                <li class="uk-nav-header"><?=$page->getLabel()?></li>
                <?php foreach ($page->listSubpages() as $subpage) { ?>
                    <li>
                        <a <?=$subpage->isCurrent()?'class="active"':''?> href="<?=$subpage->getUrl()?>">
                            <?=$subpage->getMenuLabel()?>
                        </a>
                    </li>
                <?php } ?>
            <?php } ?>
        <?php } ?>

        <li>
            <section class="sidebar-group depth-0"><p class="sidebar-heading"><span>Get started</span> <!----></p>
                <ul class="sidebar-links sidebar-group-items">
                    <li><a href="/theme/" aria-current="page" class="sidebar-link">Introduction</a></li>
                    <li><a href="/theme/setup/" class="sidebar-link">Setup</a></li>
                    <li><a href="/theme/configuration/" class="sidebar-link">Configuration</a></li>
                    <li><a href="/theme/scripts/" class="sidebar-link">Scripts &amp; Tasks</a></li>
                </ul>
            </section>
        </li>
        <li>
            <section class="sidebar-group depth-0"><p class="sidebar-heading open"><span>Theme</span> <!----></p>
                <ul class="sidebar-links sidebar-group-items">
                    <li><a href="/theme/folders/" class="sidebar-link">Folder Structure</a></li>
                    <li><a href="/theme/functions/" aria-current="page" class="active sidebar-link">Functions</a>
                        <ul class="sidebar-sub-headers">
                            <li class="sidebar-sub-header"><a href="/theme/functions/#details" class="sidebar-link">Details</a>
                            </li>
                        </ul>
                    </li>
                    <li><a href="/theme/cleanup/" class="sidebar-link">Cleanup</a></li>
                    <li><a href="/theme/bootstrap/" class="sidebar-link">Bootstrap</a></li>
                </ul>
            </section>
        </li>
        <li>
            <section class="sidebar-group depth-0"><p class="sidebar-heading"><span>Assets</span> <!----></p>
                <ul class="sidebar-links sidebar-group-items">
                    <li><a href="/theme/css/" class="sidebar-link">CSS</a></li>
                    <li><a href="/theme/javascript/" class="sidebar-link">JavaScript</a></li>
                    <li><a href="/theme/images/" class="sidebar-link">Images</a></li>
                    <li><a href="/theme/fonts/" class="sidebar-link">Fonts</a></li>
                    <li><a href="/theme/icons/" class="sidebar-link">Icons</a></li>
                    <li><a href="/theme/localization/" class="sidebar-link">Localization</a></li>
                </ul>
            </section>
        </li>
    </ul>
</aside>