<?

use Bitrix\Highloadblock as HL,
	Bitrix\Main\Loader;

Loader::includeModule("main");
	
Class itpeople_site extends CModule
{
	var $MODULE_ID = "itpeople.site";
	var $MODULE_VERSION;
	var $MODULE_VERSION_DATE;
	var $MODULE_NAME;
	var $MODULE_DESCRIPTION;
	var $MODULE_CSS;
	var $MODULE_PATH;

	function itpeople_site()
	{
		$arModuleVersion = array();

		$PATH = str_replace("\\", "/", __FILE__);
		$PATH = substr($PATH, 0, strlen($PATH) - strlen("/install/index.php"));
		$this->MODULE_PATH = $PATH;
		include($PATH."/install/version.php");

		if (is_array($arModuleVersion) && array_key_exists("VERSION", $arModuleVersion))
		{
			$this->MODULE_VERSION = $arModuleVersion["VERSION"];
			$this->MODULE_VERSION_DATE = $arModuleVersion["VERSION_DATE"];
		}
		
		$this->MODULE_NAME = $arModuleVersion["NAME"];
		$this->MODULE_DESCRIPTION = $arModuleVersion["DESCRIPTION"];
		$this->PARTNER_NAME = $arModuleVersion["PARTNER_NAME"];
		$this->PARTNER_URI = $arModuleVersion["PARTNER_URI"];
	}
	
	function InstallDB($arParams = array())
	{
		return true;
	}

	function UnInstallDB($arParams = array())
	{
		return true;
	}
	
	function InstallFiles($arParams = array())
	{
		//CopyDirFiles($this->MODULE_PATH."/install/admin",	$_SERVER["DOCUMENT_ROOT"]."/bitrix/admin");
		return true;
	}

	function UnInstallFiles()
	{
		//DeleteDirFiles($this->MODULE_PATH."/install/admin", $_SERVER["DOCUMENT_ROOT"]."/bitrix/admin");
		return true;
	}

	function DoInstall()
	{
		global $DOCUMENT_ROOT, $APPLICATION;
		//if(!$this->InstallDB()) return false;
		$this->InstallFiles();
		
		RegisterModule($this->MODULE_ID);
		
		$APPLICATION->IncludeAdminFile("Установка модуля ".$this->MODULE_ID, $this->MODULE_PATH . "/install/step.php");
	}

	function DoUninstall()
	{
		global $DOCUMENT_ROOT, $APPLICATION;
		//if(!$this->UnInstallDB()) return false;
		$this->UnInstallFiles();
		
		UnRegisterModule($this->MODULE_ID);
		UnRegisterModuleDependences("main", "OnProlog", $this->MODULE_ID, "\ItPeople\Site\Events", "StartBuffer");
		
		$APPLICATION->IncludeAdminFile("Деинсталляция модуля ".$this->MODULE_ID, $this->MODULE_PATH . "/install/unstep.php");
	}
}
?>