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

namespace Javanile\Handbook;

class Page
{
    use Page\MenuTrait;
    use Page\PrintTrait;

    /**
     * @var null
     */
    protected $scope;

    /**
     * Unique node page identifier.
     *
     * @var string
     */
    protected $resource;

    /**
     * Unique node page identifier.
     *
     * @var string
     */
    protected $slug;

    /**
     * Unique slug page identifier.
     *
     * @var string
     */
    protected $name;

    /**
     * Depth of page in directory strucure (0 for root file, +1 for each sub-directory).
     *
     * @var integer
     */
    protected $depth;

    /**
     * Constructor.
     *
     * @param $scope
     * @param $slug
     */
    public function __construct($scope, $resource, $slug)
    {
        $this->scope = $scope;
        $this->resource = $resource;
        $this->slug = $slug;
        $this->name = $this->slug != 'index' ? ucwords(basename($this->slug)) : 'Home';
        $this->depth = substr_count($slug, '/');
    }

    /**
     * @return null
     */
    public function getScope()
    {
        return $this->scope;
    }

    /**
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * @return string
     */
    public function getDepth()
    {
        return $this->depth;
    }

    /**
     * @return mixed
     */
    public function isCurrent()
    {
        return $this->scope->isCurrentPage($this);
    }

    /**
     * @return mixed
     */
    public function isParentOfCurrent()
    {
        return $this->scope->isParentOfCurrentPage($this);
    }

    /**
     *
     */
    public function hasSubPages()
    {
        return $this->scope->hasSubPages($this);
    }

    /**
     *
     */
    public function listSubPages()
    {
        return $this->scope->listSubPages($this);
    }

    /**
     *
     */
    public function hasTerminalSubPages()
    {
        return $this->scope->hasTerminalSubPages($this);
    }

    /**
     *
     */
    public function listTerminalSubPages()
    {
        return $this->scope->listTerminalSubPages($this);
    }

    /**
     *
     */
    public function hasNonterminalSubPages()
    {
        return $this->scope->hasNonterminalSubPages($this);
    }

    /**
     *
     */
    public function listNonterminalSubPages()
    {
        return $this->scope->listNonterminalSubpages($this);
    }

    /**
     *
     */
    public function content()
    {

    }

    /**
     *
     */
    public function render()
    {
        $templateEngine = $this->getScope()->getTemplateEngine();

        return $templateEngine->render('index.html.twig', [
            'page' => $this,
            'currentRootPage' => $this->getScope()->getCurrentRootPage(),
            'scope' => $this->getScope(),
        ]);
    }

    /**
     * @return string
     */
    public function getFileName()
    {
        return $this->slug.'.html';
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        $depth = $this->scope->getCurrentPage()->getDepth();

        return str_repeat('../', $depth) . $this->slug.'.html';
    }

    /**
     * @return string
     */
    public function getLabel()
    {
        return isset($this->label) ? $this->label : $this->name;
    }

    /**
     * @return string
     */
    public function getMenuLabel()
    {
        return isset($this->menuLabel) ? $this->menuLabel : $this->getLabel();
    }

    /**
     *
     */
    public function getInfo(
    ) {
        return [
            'class' => get_class($this),
            'resource' => $this->resource,
            'slug' => $this->slug,
        ];
    }
}
