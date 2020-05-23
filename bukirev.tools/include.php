<?php
/**
 * Author: Bukirev Vitaliy
 * Date: 22.05.2020
 * Time: 20:02
 */

use Bitrix\Main\Loader;

$arClasses = [
    //form
    'Bukirev\Tools\Form\Form' => 'lib/form/form.php',
    'Bukirev\Tools\Form\Field\Field' => 'lib/form/field/field.php',
    'Bukirev\Tools\Form\Field\Modifier\Creator' => 'lib/form/field/modifier/creator.php',
    'Bukirev\Tools\Form\Field\Modifier\ModifierInterface' => 'lib/form/field/modifier/modifierinterface.php',
    'Bukirev\Tools\Form\Field\Modifier\Modifier' => 'lib/form/field/modifier/modifier.php',
    'Bukirev\Tools\Form\Field\Modifier\Border' => 'lib/form/field/modifier/border.php',
    'Bukirev\Tools\Form\Field\Modifier\Display' => 'lib/form/field/modifier/display.php',
    'Bukirev\Tools\Form\Field\Modifier\Width' => 'lib/form/field/modifier/width.php',
    'Bukirev\Tools\Form\Field\Modifier\Height' => 'lib/form/field/modifier/height.php',
    'Bukirev\Tools\Form\Field\Modifier\Color' => 'lib/form/field/modifier/color.php',
    'Bukirev\Tools\Form\Field\Modifier\Tag' => 'lib/form/field/modifier/tag.php',
    'Bukirev\Tools\Form\Field\Date' => 'lib/form/field/date.php',
    'Bukirev\Tools\Form\Field\DateTime' => 'lib/form/field/datetime.php',
    'Bukirev\Tools\Form\Field\Dropdown' => 'lib/form/field/dropdown.php',
    'Bukirev\Tools\Form\Field\Textarea' => 'lib/form/field/textarea.php',
    'Bukirev\Tools\Form\Field\Textbox' => 'lib/form/field/textbox.php',
    'Bukirev\Tools\Form\Field\Time' => 'lib/form/field/time.php',
];

try {
    if (
        Loader::IncludeModule("main")
        && Loader::IncludeModule("iblock")
    ) {
        \Bitrix\Main\Loader::registerAutoLoadClasses(
            'bukirev.tools',
            $arClasses
        );
        foreach ($arClasses as $key => $value) {
            if (method_exists($key, 'regEvent')) $key::regEvent();
        }
    }
} catch (\Bitrix\Main\LoaderException $e) {

}