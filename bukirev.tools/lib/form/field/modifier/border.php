<?php
/**
 * Author: Bukirev Vitaliy
 * Date: 22.05.2020
 * Time: 21:57
 */

namespace Bukirev\Tools\Form\Field\Modifier;

class Border extends Modifier
{
    public const BORDER_UNDERLINE = self::BASE.'-underline';
    public const BORDER_NO_PADDING = self::BASE.'-no-padding';
    public const BORDER_ROUND = self::BASE.'-round';
    public const DEFAULT = self::BASE.'-no-border';
    public const ORDER = 70;

    public static function getVariants(): array
    {
        return [
            static::DEFAULT,
            static::BORDER_UNDERLINE,
            static::BORDER_NO_PADDING,
            static::BORDER_ROUND
        ];
    }
}