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

use Cocur\Slugify\Slugify;

class Functions
{
    public static function isSlug($slug)
    {
        return (boolean) preg_match('/^[a-z][a-z0-9-]+$/', $slug);
    }

    public static function isLabel($label)
    {
        return (boolean) preg_match('/^[a-z].*$/i', $label);
    }

    public static function isGlob($glob)
    {
        return (boolean) preg_match('/\*/', $glob);
    }

    /**
     *
     */
    public static function sanitizeSlug($slug)
    {
        return $slug;
    }

    /**
     * @param $file
     * @return string
     */
    public static function getFileSlug($file)
    {
        $filename = pathinfo($file, PATHINFO_FILENAME);

        return Slugify::create()->slugify($filename);
    }

    /**
     * @param $file
     * @return string
     */
    public static function getLabelSlug($label)
    {
        return Slugify::create()->slugify($label);
    }
}
