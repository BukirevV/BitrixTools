<?php
/**
 * Author: Bukirev Vitaliy
 * Date: 22.05.2020
 * Time: 19:34
 */

namespace Bukirev\Tools\Form\Field;

use Bukirev\Tools\Form\Field\Modifier\Border;
use Bukirev\Tools\Form\Field\Modifier\Color;
use Bukirev\Tools\Form\Field\Modifier\Creator;
use Bukirev\Tools\Form\Field\Modifier\Display;
use Bukirev\Tools\Form\Field\Modifier\Height;
use Bukirev\Tools\Form\Field\Modifier\Width;

/**
 * Class Field
 * @package Bukirev\Form\Field
 * @property string $name
 * @property string $id
 * @property array $arrModifier
 * @property string $subClass
 * @property string $value
 * @property string $template
 * @property string $out
 * @property string $placeholder
 * @property string $label
 * @property string $labelTemplate
 *
 */
class Field implements FieldInterface
{
    const TYPE = 'text';
    const ELEMENT = '<input type="#TYPE#" class="ui-ctl-element" value="#VALUE#" placeholder="#PLACEHOLDER#">';
    protected $name;
    protected $id;
    protected $arrModifier = [];
    protected $subClass;
    protected $before = null;
    protected $after = null;
    protected $value;
    protected $template =
        '<div class="ui-ctl ui-ctl-textbox #MOD#">
            #BEFORE#
            #AFTER#
            #ELEMENT#
        </div>';
    protected $out;
    protected $label;
    protected $placeholder;
    protected $labelTemplate = '<div>#LABEL#:</div>';


    public function __construct(string $name, array $property = null)
    {
        $this->name = $name;
        if ($property !== null) {
            foreach ($property as $key => $value) {
                if (property_exists(static::class, $key )) $this->$key = $value;
                if ($key == 'modifiers') {
                    foreach ($value as $modKey => $modVal) {
                        $this->addModifier(Creator::createExt($modKey, $modVal));
                    }
                }
            }
        }
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getType(): string
    {
        return static::TYPE;
    }

    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    public function setSubclass($subclass)
    {
        $this->subClass = $subclass;

        return $this;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function addModifier($mod)
    {
        if (is_object($mod)) {
            $this->arrModifier[$mod->getOrder()] = $mod;
        } else {
            $modObj = Creator::create($mod);
            if ($mod !== null)
                $this->addModifier($modObj);
        }

        return $this;
    }

    public function getModifierArray(): array
    {
        return $this->arrModifier;
    }

    public function getModifierString(): string
    {
        $result = [];
        foreach ($this->arrModifier as $item) {
            $result[] = $item;
        }

        $result[] = $this->subClass;

        return implode(' ', $result);
    }

    public function setBefore($mod, $ext = false)
    {
        return $this;
    }

    public function setAfter($mod, $ext = false)
    {
        return $this;
    }

    public function __get($name)
    {
        if (isset($this->$name))
            return $this->$name;

        return null;
    }

    public function __toString(): string
    {
        $this->out = $this->template;
        $this->prepareBefore();
        $this->prepareAfter();
        $this->prepareElement();
        $this->prepareMod();

        if (!empty($this->label)) {
            $this->out = $this->labelTemplate.$this->out;
            $this->prepareLabel();
        }

        return $this->out;
    }

    public function prepareElement(): void
    {
        $elem =  str_replace('#TYPE#', static::TYPE, static::ELEMENT);
        $elem =  str_replace('#VALUE#', $this->value, $elem);
        $elem =  str_replace('#PLACEHOLDER#', $this->placeholder, $elem);

        $this->out = str_replace('#ELEMENT#', $elem, $this->out);
    }

    public function prepareBefore(): void
    {
        $this->out = str_replace('#BEFORE#', $this->before, $this->out);
    }

    public function prepareAfter(): void
    {
        $this->out = str_replace('#AFTER#', $this->after, $this->out);
    }

    public function prepareMod(): void
    {
        $this->out = str_replace('#MOD#', $this->getModifierString(), $this->out);
    }

    public function prepareLabel(): void
    {
        $this->out = str_replace('#LABEL#', $this->label, $this->out);
    }

    public function setTemplate($templ)
    {
        $this->template = $templ;

        return $this;
    }

    public function setBorder($mod = null)
    {
        $obj = new Border($mod);
        $this->addModifier($obj);

        return $this;
    }

    public function setColor($mod = null)
    {
        $obj = new Color($mod);
        $this->addModifier($obj);

        return $this;
    }

    public function setDisplay($mod = null)
    {
        $obj = new Display($mod);
        $this->addModifier($obj);

        return $this;
    }

    public function setHeight($mod = null)
    {
        $obj = new Height($mod);
        $this->addModifier($obj);

        return $this;
    }

    public function setWidth($mod = null)
    {
        $obj = new Width($mod);
        $this->addModifier($obj);

        return $this;
    }

    public function setTag($mod = null)
    {
        $obj = new Tag($mod);
        $this->addModifier($obj);

        return $this;
    }

    public function hasMods()
    {
        return (bool)count($this->arrModifier);
    }
}