<?php
/**
 * Author: Bukirev Vitaliy
 * Date: 22.05.2020
 * Time: 18:28
 */

namespace Bukirev\Tools\Form;

use Bitrix\Landing\Field\Textarea;
use Bukirev\Tools\Form\Field\DateTime;
use Bukirev\Tools\Form\Field\Dropdown;
use Bukirev\Tools\Form\Field\Field;
use Bukirev\Tools\Form\Field\Modifier\Creator;
use Bukirev\Tools\Form\Field\Modifier\Modifier;
use Bukirev\Tools\Form\Field\TextBox;
use Bukirev\Tools\Form\Field\Date;
use Bukirev\Tools\Form\Field\Time;

/**
 * Class Form
 * @property string $name
 * @property string $id
 * @property string $action
 * @property string $method
 * @property string $subclass
 * @property Field[] $arFields
 * @property Modifier[] $arMods
 *
 */
class Form
{
    protected $name;
    protected $id;
    protected $action;
    protected $method;
    protected $subclass;
    protected $arFields = [];
    protected $arMods = [];

    public function __construct(string $name, array $property = null)
    {
        $this->name = $name;
        if ($property !== null) {
            foreach ($property as $key => $value) {
                if (property_exists(static::class, $key )) $this->$key = $value;
                if ($key == 'defaulModifiers') {
                    foreach ($value as $modKey => $modVal) {
                        $this->addDefaultMod(Creator::createExt($modKey, $modVal));
                    }
                }
            }
        }
    }

    public function setAction(string $action)
    {
        $this->action = $action;

        return $this;
    }

    public function setMethod(string $method)
    {
        $this->method = $method;

        return $this;
    }

    public function setSubclass(string $subclass)
    {
        $this->subclass = $subclass;

        return $this;
    }

    public function addField(object $field)
    {
        if (is_object($field))
            $this->arFields[] = $field;

        return $this;
    }

    public function addText(string $name, array $property = null)
    {
        $field = new Field($name, $property);
        return $this->addField($field);

    }

    public function addTextarea(string $name, array $property = null)
    {
        $field = new Textarea($name, $property);
        return $this->addField($field);
    }

    public function addTextbox(string $name, array $property = null)
    {
        $field = new TextBox($name, $property);
        return $this->addField($field);
    }

    public function addDate(string $name, array $property = null)
    {
        $field = new Date($name, $property);
        return $this->addField($field);
    }

    public function addDatetime(string $name, array $property = null)
    {
        $field = new DateTime($name, $property);
        return $this->addField($field);
    }

    public function addDropdown(string $name, array $property = null)
    {
        $field = new Dropdown($name, $property);
        return $this->addField($field);
    }

    public function addTime(string $name, array $property = null)
    {
        $field = new Time($name, $property);
        return $this->addField($field);
    }

    public function addDefaultMod($mod)
    {
        $this->arMods[] = $mod;

        return $this;
    }

    public function __toString()
    {
        \Bitrix\Main\UI\Extension::load("ui.forms");
        $text = "<form name=\"$this->name\" id=\"$this->id\" action=\"$this->action\" method=\"$this->method\">";
        foreach ($this->arFields as $field) {
            if (!empty($this->subclass))
                $field->setSubclass($this->subclass);
            if (!$field->hasMods())
                foreach ($this->arMods as $itemMod)
                    $field->addModifier($itemMod);
            $text .= $field;
        }
        $text .= '<form>';

        return $text;
    }

    public function end()
    {
        echo $this;
    }
}