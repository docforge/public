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

<ul class="tm-nav uk-nav">

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

</ul>
