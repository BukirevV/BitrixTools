<?php
/**
 * Author: Bukirev Vitaliy
 * Date: 23.05.2020
 * Time: 20:24
 */

namespace Bukirev\Tools\Form\Field;

use Bukirev\Tools\Form\Field\Field;

class Date extends Field
{
    const TYPE = 'div';
    const ELEMENT = '<#TYPE# class="ui-ctl-element">#VALUE#</#TYPE#>';
    protected $template =
        '<div class="ui-ctl ui-ctl-date #MOD#">
            #BEFORE#
            #AFTER#
            #ELEMENT#
        </div>';
}