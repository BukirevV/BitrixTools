# BitrixTools
Набор инструментов для разработки на Bitrix

Для использования нужно скопировать в папку модулей и установить модуль.

На данный момент содержит слассы для работы с:
Form - вывод форм стандартными средствами Битрикс. Форма генерируется не используя компоненты. Используется стандартное расширение \Bitrix\Main\UI\Extension::load("ui.forms") и посторение html кода как в примерах на сайте https://dev.1c-bitrix.ru/api_d7/bitrix/ui/forms/index.php


#Form
Пример использования:

<style><!-- Тестовый класс для подключения к элементам дополнительно-->
    .testSubclass {
        margin: 1em auto;
        background: grey;
    }
</style>
<?php


Loader::includeModule('bukirev.tools');


$ft = (new \Bukirev\Tools\Form\Form('proba', // обязательно задать имя формы
    [
        'defaulModifiers' => [ // если надо задать модификаторы для полей по умолчанию
            'display' => \Bukirev\Tools\Form\Field\Modifier\Display::DEFAULT,
            'widht' => \Bukirev\Tools\Form\Field\Modifier\Width::SIZE_33
        ]
    ]
));

$ft->addText('text1') // добавляем поле с именем text1
    ->addText('text2', ['value' => 34]) // добавляем поле text2 со значением 34
    ->addDropdown('dd', ['variants' => [1 => 'XA!', 2 => 'XU!']]) // добавляем селектор dd с вариантами
    ->end(); // выводим форму.




$f = (new \Bukirev\Tools\Form\Form('test')) // создаем форму test
	->setSubclass('testSubclass'); // назначаем суб класс он будет добавляться ко всем елементам формы
$field = (new \Bukirev\Tools\Form\Field\Field('test')) // создаем поле
    ->setValue('aaaa') // устанавливаем значение
    ->setWidth(\Bukirev\Tools\Form\Field\Modifier\Width::SIZE_100) // устанавливаем ширину
    ->setBorder(\Bukirev\Tools\Form\Field\Modifier\Border::BORDER_UNDERLINE); // устанвливаем границу

$f->addField($field); // добавляем созданное поле в форму
$f->addDate('date'); // добавляем поле даты
$f->addDatetime('datetime'); // добавляем поле даты времени
$f->addDropdown('dd1', // добавяляем поле со списком
    [
        'variants' => [
            1 => 'Один',
            2 => 'Два',
            3 => 'Три',
        ]
    ]
);
$f->addText('dd', // добавляем поле с модификаторами ширины и границы
    [
        'modifiers' => [
            'width' => \Bukirev\Tools\Form\Field\Modifier\Width::SIZE_33,
            'border' => \Bukirev\Tools\Form\Field\Modifier\Border::BORDER_UNDERLINE,
        ]
    ]
);
$f->end(); // выводим форму


'Bukirev\Tools\Form\Form' => класс формы
'Bukirev\Tools\Form\Field\Field' => класс поля
'Bukirev\Tools\Form\Field\Modifier\Creator' => класс создатель полей по форме класс/вариант_модификатора
'Bukirev\Tools\Form\Field\Modifier\Modifier' => базовый класс модификатора
'Bukirev\Tools\Form\Field\Modifier\Border' => модификатор границы
'Bukirev\Tools\Form\Field\Modifier\Display' => модификатор поведения блока
'Bukirev\Tools\Form\Field\Modifier\Width' => модификатор ширины
'Bukirev\Tools\Form\Field\Modifier\Height' => модификатор высоты
'Bukirev\Tools\Form\Field\Modifier\Color' => модификатор цвета рамки
'Bukirev\Tools\Form\Field\Modifier\Tag' => модификатор тега
'Bukirev\Tools\Form\Field\Date' => поле даты
'Bukirev\Tools\Form\Field\DateTime' => поле даты времени
'Bukirev\Tools\Form\Field\Dropdown' => поле списка
'Bukirev\Tools\Form\Field\Textarea' => 
'Bukirev\Tools\Form\Field\Textbox' => 
'Bukirev\Tools\Form\Field\Time' => 

Планирую добавить модификаторы иконок и автогенерацию формы из модели ORM.


PS Знаю что так в битриксе не принято, но вернувшись к нему с Yii2 не смог пережить отсутсвие ActiveForm.

