<?php
/**
 * Author: Bukirev Vitaliy
 * Date: 22.05.2020
 * Time: 19:59
 */

namespace Bukirev\Tools\Form\Field\Modifier;

interface ModifierInterface
{
    const BASE = 'ui-ctl';

    /**
     * ModifierInterface constructor.
     * @param string|null $variant
     */
    public function __construct(string $variant = null);

    /**
     * @param string $variant
     */
    public function setVariant(string $variant): void;

    /**
     * @return string
     */
    public function getVariant(): string;

    /**
     * @return string
     */
    public function __toString(): string;

    /**
     * @return int
     */
    public static function getOrder(): int;

    /**
     * @return array
     */
    public static function getVariants(): array;

    /**
     * @return string
     */
    public static function getDefaultVariant(): string;
}