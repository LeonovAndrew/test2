<?
//define('STATIC_PATH', realpath($_SERVER['DOCUMENT_ROOT'] . '/../static'));
define('SITE_MODULE_PATH', realpath(dirname(__FILE__)));
define('LOG_FILENAME', $_SERVER['DOCUMENT_ROOT'] . '/log.txt');

$composerAutoloadFile = $_SERVER['DOCUMENT_ROOT'] . "/local/vendor/autoload.php";
if(is_readable($composerAutoloadFile)){
    require_once $composerAutoloadFile;
}

$useExchangeMail = \Bitrix\Main\Config\Option::get(\ItPeople\Site\Tools::getModuleID(), 'exchange_enabled');

if($useExchangeMail === 'Y'){
	function custom_mail($To, $Subject, $Message, $AdditionalHeaders = ''){
		$message = new \ItPeople\Site\ExchangeMail([
			'type' => 'html',
			'subject' => $Subject,
			'body' => $Message,
		]);
		$message->addRecipient(null, $To);
		$message->send();
		return true;
	}
}
