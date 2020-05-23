<?php
/**
 * Author: Bukirev Vitaliy
 * Date: 22.05.2020
 * Time: 20:03
 */
use Bitrix\Main\Localization\Loc;
Loc::loadMessages(__FILE__);

if (class_exists("bukirev_tools")) return;

Class bukirev_tools extends CModule
{
    var $MODULE_ID = "bukirev.tools";
    var $MODULE_VERSION;
    var $MODULE_VERSION_DATE;
    var $MODULE_NAME;
    var $MODULE_DESCRIPTION;
    var $PARTNER_NAME;
    var $PARTNER_URI;

    function bukirev_tools()
    {
        $arModuleVersion = array();

        include('version.php');

        if (is_array($arModuleVersion) && array_key_exists("VERSION", $arModuleVersion)) {
            $this->MODULE_VERSION = $arModuleVersion["VERSION"];
            $this->MODULE_VERSION_DATE = $arModuleVersion["VERSION_DATE"];
        }

        $this->MODULE_NAME = Loc::getMessage('BUKIREV_TOOLS_MODULE_NAME');
        $this->MODULE_DESCRIPTION = Loc::getMessage('BUKIREV_TOOLS_MODULE_DESCRIPTION');
        $this->PARTNER_NAME = 'Bukirev';
        $this->PARTNER_URI = 'https://bukirev.com';
    }

    function DoInstall()
    {
        RegisterModule($this->MODULE_ID);
    }

    function DoUninstall()
    {
        UnRegisterModule($this->MODULE_ID);
    }
}

?>