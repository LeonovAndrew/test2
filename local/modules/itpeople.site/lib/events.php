<?php
/**
 * @author Anton Desin <anton.desin@gmail.com>
 * @link https://itpeople.ru/ Интернет агентство IT People
 */
 
namespace ItPeople\Site;

IncludeModuleLangFile(__FILE__);

/**
 * Класс содержит обработчики событий
 */
class Events {
	
	/**
	 * Выполнение необходимых действий до начала вывода
	 * 
	 * Метод является обработчиком события OnProlog модуля main
	 * 
	 * @static
	 * @return void
	 */
	static public function StartBuffer(){
		if(!\Bitrix\Main\Loader::includeModule("itpeople.site")) die();
	}
}
