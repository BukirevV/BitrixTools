<?php
/**
 * Author: Bukirev Vitaliy
 * Date: 22.05.2020
 * Time: 21:47
 */

namespace Bukirev\Tools\Form\Field\Modifier;

class Height extends Modifier
{
    public const DEFAULT = self::BASE.'-md';
    public const ORDER = 40;

    public static function getVariants(): array
    {
        return [
            static::DEFAULT,
            self::BASE.'-lg',
            self::BASE.'-sm',
            self::BASE.'-xs'
        ];
    }
}