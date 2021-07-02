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

        </a>

        <ul id="dw-navbar-menu" class="uk-navbar-nav uk-hidden-small">

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
                    <a class="nav-link <?=$page->isCurrent()||$page->isParentOfCurrent()?'router-link-active':''?>"
                            href="<?=$page->getUrl()?>">
                        <?=$page->getMenuLabel()?>
                    </a>
                </div>
            <?php } ?>




            <div class="nav-item"><a href="/theme/" class="nav-link ">
                    Theme
                </a></div>
            <div class="nav-item"><a href="/integrations/" class="nav-link">
                    Integrations
                </a></div>
            <div class="nav-item"><a href="/about/" class="nav-link">
                    About
                </a></div>
            <a href="https://github.com/stefanobartoletti/bricks" target="_blank" rel="noopener noreferrer"
               class="repo-link">
                GitHub
                <span><svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false" x="0px" y="0px"
                           viewBox="0 0 100 100" width="15" height="15" class="icon outbound"><path fill="currentColor"
                                                                                                    d="M18.8,85.1h56l0,0c2.2,0,4-1.8,4-4v-32h-8v28h-48v-48h28v-8h-32l0,0c-2.2,0-4,1.8-4,4v56C14.8,83.3,16.6,85.1,18.8,85.1z"></path> <polygon
                                fill="currentColor"
                                points="45.7,48.7 51.3,54.3 77.2,28.5 77.2,37.2 85.2,37.2 85.2,14.9 62.8,14.9 62.8,22.9 71.5,22.9"></polygon></svg> <span
                            class="sr-only">(opens new window)</span></span></a>
        </nav>
    </div>
</header>