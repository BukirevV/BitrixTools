<?php
/**
 * Author: Bukirev Vitaliy
 * Date: 22.05.2020
 * Time: 19:59
 */

namespace Bukirev\Tools\Form\Field\Modifier;

/**
 * Class Modifier
 * @package Bukirev\Form\Field\Modifier
 * @property string $variant
 */

class Modifier implements ModifierInterface
{
    protected $variant;
    public const DEFAULT = self::BASE;
    public const ORDER = 10;

    public function __construct(string $variant= null)
    {
        if ($variant === null || $variant == ''){
            $this->variant = self::DEFAULT;
        } elseif(in_array($variant, static::getVariants())) {
            $this->variant = $variant;
        } else {
            $this->variant = static::DEFAULT;
        }
    }

    public function setVariant($variant): void
    {
        $this->variant = $variant;
    }

    public function getVariant(): string
    {
        return $this->variant;
    }

    public function __toString(): string
    {
        return $this->variant;
    }

    public static function getOrder(): int
    {
        return static::ORDER;
    }

    public static function getVariants(): array
    {
        return [self::DEFAULT];
    }

    public static function getDefaultVariant(): string
    {
        return  (string)array_shift(static::getVariants());
    }
}