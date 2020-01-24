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

<div class="tm-footer">
    <div class="uk-container uk-container-center uk-text-center">

        <ul class="uk-subnav uk-subnav-line">
            <li><a href="a">a</a></li>
            <li><a href="b">b</a></li>
        </ul>

        <div class="uk-panel">
            <p>
                Footer
            </p>
            <a  href="/"
                class="dw-brand"
            ><i class="uk-icon-logo"></i> <?=$scope->getName()?></a>
        </div>

    </div>
</div>

<div id="tm-offcanvas" class="uk-offcanvas">

    <div class="uk-offcanvas-bar uk-offcanvas-bar-show">

        <ul class="uk-nav uk-nav-offcanvas">
            <li><a>aa</a></li>
        </ul>

    </div>

</div>

<div class="uk-tooltip"></div>

<script type="text/javascript" src="js/index.js"></script>

</body>
</html>