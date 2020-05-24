<?php
/**
 * Author: Bukirev Vitaliy
 * Date: 23.05.2020
 * Time: 20:25
 */

namespace Bukirev\Tools\Form\Field;

use Bukirev\Tools\Form\Field\Field;

class DateTime extends Field
{
    const TYPE = 'div';
    const ELEMENT = '<#TYPE# class="ui-ctl-element">#VALUE#</#TYPE#>';
    protected $template =
        '<div class="ui-ctl ui-ctl-after-icon ui-ctl-datetime #MOD#">
            #BEFORE#
            #AFTER#
            <div class="ui-ctl-ext-after ui-ctl-icon-calendar"></div>
            #ELEMENT#
        </div>';
}