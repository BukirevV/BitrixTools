<?php
/**
 * Author: Bukirev Vitaliy
 * Date: 23.05.2020
 * Time: 19:28
 */

namespace Bukirev\Tools\Form\Field;

use Bukirev\Tools\Form\Field\Field;

/**
 * Class TextBox
 * @property array $values
 *
 */
class Dropdown extends Field
{
    const TYPE = 'select';
    const ELEMENT = '<#TYPE# class="ui-ctl-element">#VALUE#</#TYPE#>';
    protected $template =
        '<div class="ui-ctl ui-ctl-dropdown #MOD#">
            #BEFORE#
            #AFTER#
            #ELEMENT#
        </div>';
    protected $values;

    public function __construct(string $name, array $property = null)
    {
        parent::__construct($name, $property);
        if(isset($property['variants']))
            $this->setValues($property['variants']);
    }

    public function setValues($arVal)
    {
        $this->values = $arVal;
    }

    public function prepareElement(): void
    {
        $str = [];
        foreach ($this->values as $key => $item) {
            if ($key == $this->value || in_array($key, (array)$this->value)) {
                $str[] = '<option value="'.$key.'" selected>'.$item.'</option>';
            } else {
                $str[] = '<option value="'.$key.'">'.$item.'</option>';
            }
        }
        $elem = str_replace('#TYPE#', static::TYPE, static::ELEMENT);
        $elem = str_replace('#VALUE#', implode('', $str), $elem);

        $this->out = str_replace('#ELEMENT#', $elem, $this->out);
    }
}