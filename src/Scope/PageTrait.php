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

namespace Javanile\Handbook\Scope;

use Javanile\Handbook\Functions;
use Javanile\Handbook\Page;
use Javanile\Handbook\Page404;
use Javanile\Handbook\YamlPage;
use Symfony\Component\Yaml\Yaml;

trait PageTrait
{
    /**
     * @param $resource
     * @param $slug
     * @return mixed
     */
    public function buildPage($resource, $slug)
    {
        $pageClass = $this->getClassName($resource);
        if ($this->isSourceFile($resource)) {
            $pageClass = $this->getClassNameBySourceFile($resource);
        } elseif ($this->isYamlFile($resource)) {
            $pageClass = $this->getYamlPageClass($resource);
        }

        if (!class_exists($pageClass)) {
            $pageClass = Page::class;
        }

        return new $pageClass($this, $resource, $slug);
    }

    /**
     * @param $array
     * @return mixed
     */
    public static function getFirstPageRecursive($pages, &$slug)
    {
        if (!is_array($pages)) {
            return $pages;
        }

        $pagesKeys = array_keys($pages);
        $pagesReverse = array_reverse($pages);
        $firstValue = array_pop($pagesReverse);
        $firstKey = isset($pagesKeys[0]) ? $pagesKeys[0] : 'Home';
        $slug = $slug.'/'.$firstKey;

        if (is_array($firstValue)) {
            return static::getFirstPageRecursive($firstValue, $slug);
        }

        return $firstValue;
    }

    /**
     * @param $page
     */
    public function setCurrentPage($page)
    {
        $this->currentPage = $page;
    }

    /**
     * @return mixed
     */
    public function getCurrentPage()
    {
        return $this->currentPage;
    }

    /**
     * @param string $slug
     * @return Page404
     */
    public function getPage404($slug  = '404')
    {
        return new Page404($this, $slug);
    }

    /**
     * @param $page
     * @return bool
     */
    public function isCurrentPage($page)
    {
        return $this->currentPage->getSlug() == $page->getSlug();
    }

    /**
     * Check if page is parent of current page.
     *
     * @param $page
     * @return bool
     */
    public function isParentOfCurrentPage($page)
    {
        $slug = $page->getSlug().'/';
        $currentSlug = $this->currentPage->getSlug();
        $currentSlugCut = substr($currentSlug, 0, strlen($slug));

        return $slug == $currentSlugCut;
    }

    /**
     * @return mixed
     */
    public function getCurrentRootPage()
    {
        foreach ($this->listRootPages() as $page) {
            if ($this->isCurrentPage($page)) {
                return $page;
            }
            if ($this->isParentOfCurrentPage($page)) {
                return $page;
            }
        }

        return new Page404($this, '404');
    }
}
