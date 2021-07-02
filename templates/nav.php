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

<header class="navbar">
    <div class="sidebar-button">
        <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" role="img" viewBox="0 0 448 512" class="icon">
            <path fill="currentColor"
                  d="M436 124H12c-6.627 0-12-5.373-12-12V80c0-6.627 5.373-12 12-12h424c6.627 0 12 5.373 12 12v32c0 6.627-5.373 12-12 12zm0 160H12c-6.627 0-12-5.373-12-12v-32c0-6.627 5.373-12 12-12h424c6.627 0 12 5.373 12 12v32c0 6.627-5.373 12-12 12zm0 160H12c-6.627 0-12-5.373-12-12v-32c0-6.627 5.373-12 12-12h424c6.627 0 12 5.373 12 12v32c0 6.627-5.373 12-12 12z"></path>
        </svg>
    </div>
    <a href="/" class="home-link router-link-active">
        <img src="/bricks-logo.svg" alt="Bricks" class="logo">
        <span class="site-name can-hide"><?=$scope->getName()?></span>
    </a>
    <div class="links">
        <div class="search-box"><input aria-label="Search" autocomplete="off" spellcheck="false" value=""> <!----></div>
        <nav class="nav-links can-hide">
            <?php foreach ($scope->listRootPages() as $page) { ?>
                <div class="nav-item">
                    <a href="<?=$page->getUrl()?>" class="nav-link <?=$page->isCurrent()||$page->isParentOfCurrent()?'router-link-active':''?>">
                        <?=$page->getMenuLabel()?>
                    </a>
                </div>
            <?php } ?>
        </nav>
    </div>
</header>
