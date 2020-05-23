<?php
/**
 * Author: Bukirev Vitaliy
 * Date: 22.05.2020
 * Time: 21:28
 */

namespace Bukirev\Tools\Form\Field\Modifier;

class Width extends Modifier
{
    public const SIZE_25 = self::BASE.'-w25';
    public const SIZE_33 = self::BASE.'-w33';
    public const SIZE_50 = self::BASE.'-w50';
    public const SIZE_75 = self::BASE.'-w75';
    public const SIZE_100 = self::BASE.'-w100';
    public const SIZE_AUTO = self::BASE.'-wa';
    public const DEFAULT = self::BASE.'-wd';
    public const ORDER = 30;

    public static function getVariants(): array
    {
        return [
            static::DEFAULT,
            static::SIZE_25,
            static::SIZE_33,
            static::SIZE_50,
            static::SIZE_75,
            static::SIZE_100,
            static::SIZE_AUTO
        ];
    }
}