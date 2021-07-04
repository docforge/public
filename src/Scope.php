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

abstract class Scope
{
    use Scope\CacheTrait;
    use Scope\PageTrait;
    use Scope\PagesTrait;
    use Scope\TemplatesTrait;

    /**
     * Configuration filename.
     *
     * @var string
     */
    protected $config;

    /**
     * @var
     */
    protected $workingDir;

    /**
     * @var
     */
    protected $templatesDir;

    /**
     *
     */
    protected $twig;

    /**
     * Constructor.
     *
     * @param $configFile
     */
    public function __construct($config, $theme)
    {
        $this->config = $config;
        $this->templatesDir = $theme . '/templates';
        $this->path = isset($config['path']) ? $config['path'] : getcwd();

        $loader = new \Twig\Loader\FilesystemLoader($this->templatesDir);
        $this->twig = new \Twig\Environment($loader, [
            'cache' => __DIR__.'/../cache',
        ]);
    }

    /**
     *
     */
    protected function initScope()
    {
        $source = isset($this->config['source']) ? $this->config['source'] : getcwd();
        $namespace = isset($this->config['namespace']) ? $this->config['namespace'] : '';
        if (isset($this->config['autoload']) && is_dir($this->config['autoload'])) {
            spl_autoload_register(function ($class) use ($source, $namespace) {
                if (substr($class, 0, strlen($namespace)) == $namespace) {
                    require_once $source . '/' . strtr(substr($class, strlen($namespace)), '\\_', '//').'.php';
                }
            });
        }
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return isset($this->config['name']) ? $this->config['name'] : 'docforge';
    }

    /**
     * @return mixed
     */
    public function getAuthor()
    {
        return isset($this->config['author']) ? $this->config['author'] : 'someone';
    }

    /**
     * @param $class
     * @return string
     */
    public function getClassName($class)
    {
        if (isset($this->config['namespace']) && $this->config['namespace']) {
            return trim($this->config['namespace'], '\\') . '\\' . trim($class, '\\');
        }

        return trim($class, '\\');
    }

    /**
     * @param $class
     * @return string
     */
    public function isClassName($class)
    {
        return class_exists($this->getClassName($class));
    }

    /**
     * @param $class
     * @return string
     */
    public function isSourceFile($file)
    {
        return file_exists($this->getSourceFile($file));
    }

    /**
     * @param string $path
     * @return string
     */
    public function getWorkingDir($path = '')
    {
        return $this->workingDir.'/'.$path;
    }

    /**
     * @param string $path
     * @return string
     */
    public function getSourceFile($file)
    {
        return $this->getSourceDir() . '/' . $file;
    }

    /**
     * @param string $path
     * @return string
     */
    public function getSourceDir()
    {
        return isset($this->config['source']) ? $this->workingDir.'/'.$this->config['source'] : $this->workingDir;
    }

    /**
     *
     */
    public function getStyleCss()
    {
        $depth = $this->getCurrentPage()->getDepth();

        return str_repeat('../', $depth) . 'css/style.css';
    }
}
