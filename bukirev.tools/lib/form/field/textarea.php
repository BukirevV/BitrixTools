<?php
/**
 * Author: Bukirev Vitaliy
 * Date: 23.05.2020
 * Time: 19:22
 */

namespace Bukirev\Tools\Form\Field;

use Bukirev\Tools\Form\Field\Field;

class TextArea extends Field
{
    const TYPE = 'textarea';
    const ELEMENT = '<#TYPE# class="ui-ctl-element">#VALUE#</#TYPE#>';
    protected $template =
        '<div class="ui-ctl ui-ctl-textarea #MOD#">
            #BEFORE#
            #AFTER#
            #ELEMENT#
        </div>';
}