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

use Gajus\Dindent\Indenter;

class Builder extends Scope
{
    /**
     *
     */
    protected $buildDir;

    /**
     *
     */
    protected $assets = [
        'css' => ['css', 'map'],
        'fonts' => [],
        'js' => ['js', 'map'],
    ];

    /**
     *
     */
    public function run()
    {
        $this->initScope();

        $indenter = new Indenter(['indentation_character' => '  ']);

        // Build HTML files
        foreach ($this->listAllPages() as $page) {
            $this->setCurrentPage($page);
            $pageFile = $this->getBuildPath($page->getFileName());
            echo "Writing $pageFile ";
            if (!is_dir(dirname($pageFile))) {
                mkdir(dirname($pageFile), 0777, true);
            }
            echo ".";
            $html = $page->render();
            echo ".";
            $html = $indenter->indent($html);
            echo ".";
            $ok = file_put_contents($pageFile, $html);
            chmod($pageFile, 0777);
            echo "\n";
        }

        // Copy Assests
        echo "Copy assets\n";
        foreach ($this->assets as $assetDir => $extensions) {
            static::assetCopy(
                $this->publicDir.'/'.$assetDir,
                $this->buildDir.'/'.$assetDir,
                $extensions
            );
        }
    }

    /**
     * @return string
     */
    public function getBuildDir()
    {
        $this->buildDir = isset($this->config['output']) ? $this->config['output'] : 'build';

        return $this->buildDir;
    }

    /**
     * @param string $file
     * @return string
     */
    public function getBuildPath($file = '')
    {
        $cwd = getcwd();

        return $cwd.'/'.$this->getBuildDir().'/'.$file;
    }

    /**
     * @param $src
     * @param $dst
     */
    public static function assetCopy($source, $target, $extensions)
    {
        $dir = opendir($source);

        if (!is_dir($target)) {
            echo "Create $target\n";
            mkdir($target, 0777, true);
        }

        while (($file = readdir($dir))) {
            if (($file != '.') && ($file != '..')) {
                if (is_dir($source . '/' . $file)) {
                    self::assetCopy($source .'/'. $file, $target .'/'. $file, $extensions);
                } else {
                    copy($source .'/'. $file, $target .'/'. $file);
                }
            }
        }

        closedir($dir);
    }
}
