<?php
/**
 * Author: Bukirev Vitaliy
 * Date: 22.05.2020
 * Time: 21:24
 */

namespace Bukirev\Tools\Form\Field\Modifier;

class Display extends Modifier
{
    public const BLOCK = self::BASE.'-block';
    public const DEFAULT = self::BASE.'-inline';
    public const ORDER = 20;

    public static function getVariants(): array
    {
        return [
            static::DEFAULT,
            static::BLOCK
        ];
    }
}