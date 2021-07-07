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

use Symfony\Component\Yaml\Yaml;

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
     * Configuration filename.
     *
     * @var string
     */
    protected $path;

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
    protected $templateEngine;

    /**
     * Constructor.
     *
     * @param $config
     * @param $theme
     */
    public function __construct($config, $theme)
    {
        $this->config = $config;
        $this->templatesDir = $theme . '/templates';
        $this->path = isset($config['path']) ? $config['path'] : getcwd();

        $loader = new \Twig\Loader\FilesystemLoader($this->templatesDir);
        $this->templateEngine = new \Twig\Environment($loader, [
            'cache' => false,
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
                    if (file_exists($file = $source . '/' . strtr(substr($class, strlen($namespace)), '\\_', '//').'.php')) {
                        include_once $file;
                    }
                }
            });
        }
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return isset($this->config['name']) ? $this->config['name'] : 'Handbook';
    }

    /**
     * @return mixed
     */
    public function getAuthor()
    {
        return isset($this->config['author']) ? $this->config['author'] : 'Someone';
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
     * @param $file
     *
     * @return string
     */
    public function getClassNameBySourceFile($file)
    {
        $className = substr($file, strlen($this->config['source']), -4);

        return $this->getClassName(trim(strtr($className, '/', '\\'), '\\'));
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
     * Check if file is the source directory.
     *
     * @param $file
     *
     * @return string
     */
    public function isSourceFile($file)
    {
        $sourceFile = $this->getSourceFile($file);

        return pathinfo($sourceFile, PATHINFO_EXTENSION) == 'php' &&  file_exists($sourceFile);
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
        $realpath = realpath($file);
        if ($realpath && $file == $realpath) {
            // check if file is already a absolute path
            return $file;
        }

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

    /**
     *
     */
    public function getTemplateEngine()
    {
        return $this->templateEngine;
    }

    /**
     * @param $yamlFile
     *
     * @return bool
     */
    public function isYamlFile($yamlFile)
    {
        $yamlFile = $this->config['source'].'/'.$yamlFile;
        $fileExtension = strtolower(pathinfo($yamlFile, PATHINFO_EXTENSION));

        return in_array($fileExtension, ['yaml', 'yml']) && file_exists($yamlFile);
    }

    /**
     * @param $yamlFile
     *
     * @return bool
     */
    public function getYamlFile($yamlFile)
    {
        $yamlFile = $this->config['source'].'/'.$yamlFile;

        return $yamlFile;
    }

    /**
     *
     */
    public function getYamlPageClass($yamlFile)
    {
        $yaml = Yaml::parseFile($yamlFile);

        return isset($yaml['class']) && class_exists($yaml['class']) ? $yaml['class'] : YamlPage::class;
    }

    /**
     * @param $markdownFile
     *
     * @return bool
     */
    public function isMarkdownFile($markdownFile)
    {
        $markdownFile = $this->config['source'].'/'.$markdownFile;
        $fileExtension = strtolower(pathinfo($markdownFile, PATHINFO_EXTENSION));

        return in_array($fileExtension, ['md', 'markdown']) && file_exists($markdownFile);
    }
}
