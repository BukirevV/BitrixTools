<?php
/**
 * Author: Bukirev Vitaliy
 * Date: 23.05.2020
 * Time: 18:17
 */

namespace Bukirev\Tools\Form\Field\Modifier;

class Creator
{
    public static function createExt($class, $var)
    {
        $mod = null;
        $class = 'Bukirev\Tools\Form\Field\Modifier\\'.ucfirst(strtolower($class));

        if (class_exists($class)) {
            $mod = new $class($var);
        }

        return $mod;
    }

    public static function create($variant)
    {
        $mod = null;
        $data = explode('/', $variant);
        if (isset($data[0])) $class = ucfirst(strtolower($data[0]));
        if (isset($data[1])) $var = strtolower($data[1]);

        if (isset($class) && class_exists($class)) {
            if (isset($var)) {
                $mod = new $class($var);
            } else {
                $mod = new $class();
            }
        }

        return $mod;
    }
}