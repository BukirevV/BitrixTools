<?php
/**
 * Author: Bukirev Vitaliy
 * Date: 22.05.2020
 * Time: 19:27
 */
namespace Bukirev\Tools\Form\Field;

interface FieldInterface
{
    public function __construct(string $name, array $property = null);

    public function getName(): string;

    public function getId(): string;

    public function getType(): string;

    public function setValue($value);

    public function getValue();

    public function addModifier($mod);

    public function getModifierArray(): array;

    public function getModifierString(): string;

    public function setBefore($mod, $ext = false);

    public function setAfter($mod, $ext = false);

    public function __get($name);

    public function __toString(): string;

    public function setTemplate($templ);
}