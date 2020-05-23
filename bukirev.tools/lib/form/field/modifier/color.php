<?php
/**
 * Author: Bukirev Vitaliy
 * Date: 22.05.2020
 * Time: 21:49
 */

namespace Bukirev\Tools\Form\Field\Modifier;

class Color extends Modifier
{
    public const DEFAULT = self::BASE.'-active';
    public const ORDER = 50;

    public static function getVariants(): array
    {
        return [
            static::DEFAULT,
            self::BASE.'-hover',
            self::BASE.'-success',
            self::BASE.'-warning',
            self::BASE.'-danger',
            self::BASE.'-disabled'
        ];
    }
}