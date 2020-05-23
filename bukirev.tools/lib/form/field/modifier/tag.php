<?php
/**
 * Author: Bukirev Vitaliy
 * Date: 22.05.2020
 * Time: 21:51
 */

namespace Bukirev\Tools\Form\Field\Modifier;

class Tag extends Modifier
{
    public const DEFAULT = self::BASE.'-tag';
    public const ORDER = 60;

    public static function getVariants(): array
    {
        return [
            static::DEFAULT,
            self::BASE.'-tag-success',
            self::BASE.'-tag-primary',
            self::BASE.'-tag-danger',
            self::BASE.'-tag-warning'
        ];
    }
}