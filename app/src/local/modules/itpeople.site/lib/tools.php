<?
/**
 * @author Anton Desin <anton.desin@gmail.com>
 * @link https://itpeople.ru/ Интернет агентство IT People
 */

namespace ItPeople\Site;

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

use Bitrix\Highloadblock;
use Bitrix\Main;
use Bitrix\Main\Loader;
use \PhpOffice\PhpSpreadsheet\IOFactory;

/**
 * Класс содержит небольшой набор инструментов
 */
class Tools {
	
	/**
	 * @var string|null Абсолютный путь к директории модуля
	 */
	private static $MODULE_PATH = null;
	
	/**
	 * @var string|null Путь к директории модуля относительно корна сайта
	 */
	private static $MODULE_DIR = null;
	//private static $serverName = null;
	
	/**
	 * @var string Путь к текущей странице сайта 
	 */
	private static $curPage = null;
	
	/**
	 * @var array Массив скомпилированных сущностей Hiload-блоков
	 */
	private static $arEntity = array();
	
	/**
	 * @var string|null ID модуля
	 */
	public static $MODULE_ID;
	
	/**
	 * @var Объект определятора мобильных устройств
	 */
	public static $DETECT = null;
	
	/**
	 * Метод возвращает путь к модулю
	 * 
	 * @static
	 * @param boolean $absolute Параметр отвечает за возврат методом абсолютного пути. По-умолчанию true
	 * @return string Путь к модулю
	 */
	public static function getModulePath($absolute=true){
		if(!self::$MODULE_PATH){
			self::$MODULE_PATH = realpath(dirname(__FILE__) . '/../');
			self::$MODULE_DIR = str_replace($_SERVER['DOCUMENT_ROOT'], '', self::$MODULE_PATH);
		}
		return (!$absolute)?self::$MODULE_DIR:self::$MODULE_PATH;
	}
	
	/**
	 * Получение пути к модулю относительно корня сайта
	 * 
	 * Метод является обёрткой \ItPeople\Site\Helper::getModulePath()
	 * 
	 * @static
	 * @return string Путь к модулю относительно корня сайта
	 */
	public static function getModuleDir(){
		return self::getModulePath(false);
	}
	
	/**
	 * Метод возвращает ID модуля
	 * 
	 * @static
	 * @return string ID модуля
	 */
	public static function getModuleID(){
		self::getModulePath();
		
		$tmp = explode('\\', self::$MODULE_PATH);
		if(!$tmp || count($tmp)==1){
			$tmp = explode('/', self::$MODULE_PATH);
		}
		
		self::$MODULE_ID = array_pop($tmp);
		return self::$MODULE_ID;
	}

    static public function importPricelist($fileArray)
    {
        ini_set('memory_limit', '-1');
        ini_set('max_execution_time', 90000000);
        $_SERVER['DOCUMENT_ROOT'] = realpath(__DIR__ . '/../../../..');
        $uploadedFile = $fileArray['tmp_name'];
        $filePath = $uploadedFile;
        $handle = fopen($filePath, "r");
        \Bitrix\Main\Loader::includeModule('iblock');
        $iblock = \CIBlock::GetList(Array(), Array("CODE"=>'pricelist'), false)->Fetch();
        $elements = \CIBlockElement::GetList
        (
            array(),
            array('IBLOCK_ID'=>$iblock['ID'],)
        );

        $sections = \CIBlockSection::GetList
        (
            array(),
            array('IBLOCK_ID'=>$iblock['ID'],)
        );

        while($element = $sections->Fetch()) {
            \CIBlockSection::Delete($element['ID']);
        }

        while($element = $elements->Fetch()) {
            \CIBlockElement::Delete($element['ID']);
        }


        $codes = [];
        $ids = [];
        while (($arRes = fgetcsv($handle, 0, ';')) !== false) {
            if (!in_array($arRes[0], $codes)) {
                $section = new \CIBlockSection();
                $sectionID = $section->Add(['NAME' => $arRes[0], "IBLOCK_ID" => $iblock['ID']]);
                $codes[] = $arRes[0];
                $ids[$arRes[0]] = $sectionID;
            } else {
                $sectionID = $ids[$arRes[0]];
            }

            if ($sectionID) {
                $el = new \CIBlockElement;
                $el->Add([
                    'NAME' => trim($arRes[2]),
                    'IBLOCK_SECTION_ID' => $sectionID,
                    'IBLOCK_ID' => $iblock['ID'],
                    'PROPERTY_VALUES' => [
                        'CODE' => $arRes[1],
                        'PRICE' => $arRes[4]
                    ]
                ]);
            }
        }

    }
	
	/**
	 * Получение текущей страницы сайта
	 * 
	 * Метод является обёрткой \СMain::GetCurPage()
	 * 
	 * @static
	 * @global \CMain $APPLICATION Объект класса CMain
	 * @return string Текущая страница сайта
	 */
	public static function getCurPage(){
		if(!self::$curPage){
			global $APPLICATION;
			self::$curPage = $APPLICATION->GetCurPage();
		}
		return self::$curPage;
	}
	
	/**
	 * Проверка AJAX-запроса
	 * 
	 * @static
	 * @return boolean
	 */
	public static function isAjax(){
		if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest')
			return true;
		return false;
	}
	
	function isCaptchaEnabled(){
		$captcha_enabled = \COption::GetOptionString(\ItPeople\Site\Helper::getModuleID(), 'forms_captcha_enabled');
		
		return ($captcha_enabled == 'Y')?true:false;
	}
	
	/**
	 * Метод компилирует сущность Hiload-блока EntityName в объект вида EntityNameTable
	 * 
	 * @static
	 * @param string $entityName Имя сущности
	 * @return object объект сущности
	 */
	public static function compileEntityByName($entityName){
		if(!Loader::includeModule('highloadblock')) die('Не удалось заугрзить модуль highloadblock');
		
		if(!isset(self::$arEntity[$entityName])){
			$hlblock = self::getHLBlockByName($entityName);
			self::$arEntity[$entityName] = Highloadblock\HighloadBlockTable::compileEntity($hlblock);
		}
		return self::$arEntity[$entityName];
	}
	
	/**
	 * Метод получает параметры Hiload-блока по имени сущности
	 * 
	 * @static
	 * @param string $entityName Имя сущности
	 * @return array Массив параметров Hiload-блока
	 */
	public static function getHLBlockByName($entityName){
		if(!Loader::includeModule('highloadblock')) die('Не удалось заугрзить модуль highloadblock');
		
		$hlblock = Highloadblock\HighloadBlockTable::getList(array(
			'filter' => array('=NAME' => $entityName),
			'limit' => 1
		))->fetch();
		return $hlblock;
	}
	
	/**
	 * Инициализация определятора мобильных устройств
	 * 
	 * @static
	 * @return \Mobile_Detect Объект класса \Mobile_Detect
	 */
	public static function initDetect(){
		if(!self::$DETECT){
			//$path = self::getModulePath(). "/include/Mobile-Detect-2.8.22/Mobile_Detect.php";
			//require_once $path;
			self::$DETECT = new \Mobile_Detect();
		}
		return self::$DETECT;
	}
	
	/**
	 * Определяет мобильное устройство
	 * @static
	 * @return booleab
	 */
	public static function isMobile(){
		self::initDetect();
		return self::$DETECT->isMobile();
	}
	
	/**
	 * Определяет планшет
	 * @return mixed
	 */
	public static function isTablet(){
		self::initDetect();
		return self::$DETECT->isTablet();
	}
	
	/**
	 * Определяет телефон
	 * @return bool
	 */
	public static function isPhone(){
		self::initDetect();
		return (self::$DETECT->isMobile() && !self::$DETECT->isTablet());
	}
	
	/**
	 * Определяет десктопную версию
	 * @return bool
	 */
	public static function isDesktop(){
		self::initDetect();
		return !self::$DETECT->isMobile();
	}
	
	/**
	 * Метод возвращает 2 содедних элемента (предыдущих, следующий)
	 *
	 * @param $iblockId ID инфоблока
	 * @param $elementId ID элемента
	 * @param $arSelect Массив полей для выборки
	 * @return array Массив вида ['LEFT' => [Предыдущий элемент], 'LEFT' => [Следующий элемент элемент]]
	 */
	public static function getNearElements ($iblockId, $elementId, $arSelect=['ID', 'CODE', 'NAME', 'PREVIEW_PICTURE', 'DETAIL_PAGE_URL'], $arSort=['SORT'=>'ASC', 'ACTIVE_FROM'=>'DESC'], $arSortBack=['SORT'=>'ASC', 'ACTIVE_FROM'=>'ASc']) {
		$arResult = [];
		$arFilter = array('IBLOCK_ID' => $iblockId, 'ACTIVE' => 'Y', "CHECK_PERMISSIONS" => "Y",);
		$arSelect = array('ID', 'CODE', 'NAME', 'PREVIEW_PICTURE', 'DETAIL_PICTURE', 'DETAIL_PAGE_URL', 'PROPERTY_NAV_PICTURE');
		$res = \CIBlockElement::GetList($arSort, $arFilter,false, array('nElementID' => $elementId, 'nPageSize' => 1,), $arSelect);
		$nearElementsSide = 'LEFT';
		while ($arElem = $res->GetNext()) {
			if ($arElem['ID'] == $elementId) {
				$nearElementsSide = 'RIGHT';
				continue;
			}
			$arResult[$nearElementsSide] = $arElem;
		}
		
		if(empty($arResult['LEFT'])){
			$res = \CIBlockElement::GetList($arSortBack, $arFilter,false, array('nTopCount' => 1,), $arSelect);
			if ($arElem = $res->GetNext()) {
				$arResult['LEFT'] = $arElem;
			}
		}
		if(empty($arResult['RIGHT'])){
			$res = \CIBlockElement::GetList($arSort, $arFilter,false, array('nTopCount' => 1,), $arSelect);
			if ($arElem = $res->GetNext()) {
				$arResult['RIGHT'] = $arElem;
			}
		}
		
		if($arResult['RIGHT']['ID'] == $arResult['LEFT']['ID']){
			unset($arResult['LEFT']);
		}
		
		return $arResult;
	}
	
	/**
	 * Получение размера удалённого файла
	 * @param $url
	 * @param bool $formatSize
	 * @param bool $useHead
	 * @return int|string
	 */
	public static function getRemoteFileSize($url, $formatSize = true, $useHead = true)
	{
		if (false !== $useHead) {
			stream_context_set_default(array('http' => array('method' => 'HEAD')));
		}
		$head = array_change_key_case(get_headers($url, 1));
		// content-length of download (in bytes), read from Content-Length: field
		$clen = isset($head['content-length']) ? $head['content-length'] : 0;
		
		// cannot retrieve file size, return "-1"
		if (!$clen) {
			return -1;
		}
		
		return $formatSize?self::bytesToSize($clen):$clen;
	}
	
	/**
	 * Форматировани строки размера файла
	 * 
	 * @static
	 * @param int $bytes Размер файла в байтах
	 * @param int $precision Количество знаков после точки. По умолчанию - 2
	 * @return string Отформатированная строка размера файла
	 */
	public static function bytesToSize($bytes, $precision = 2){  
		$kilobyte = 1024;
		$megabyte = $kilobyte * 1024;
		$gigabyte = $megabyte * 1024;
		$terabyte = $gigabyte * 1024;
	   
		if (($bytes >= 0) && ($bytes < $kilobyte)) {
			return $bytes . ' Б';
	 
		} elseif (($bytes >= $kilobyte) && ($bytes < $megabyte)) {
			return round($bytes / $kilobyte, $precision) . ' КБ';
	 
		} elseif (($bytes >= $megabyte) && ($bytes < $gigabyte)) {
			return round($bytes / $megabyte, $precision) . ' МБ';
	 
		} elseif (($bytes >= $gigabyte) && ($bytes < $terabyte)) {
			return round($bytes / $gigabyte, $precision) . ' ГБ';
	 
		} elseif ($bytes >= $terabyte) {
			return round($bytes / $terabyte, $precision) . ' ТБ';
		} else {
			return $bytes . ' Б';
		}
	}
	
	function getUserIP(){
		$realIp  = @$_SERVER['HTTP_X_REAL_IP'];
		$client  = @$_SERVER['HTTP_CLIENT_IP'];
		$forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
		$remote  = $_SERVER['REMOTE_ADDR'];

		if(filter_var($realIp, FILTER_VALIDATE_IP)){
			$ip = $realIp;
		}elseif(filter_var($client, FILTER_VALIDATE_IP)){
			$ip = $client;
		}elseif(filter_var($forward, FILTER_VALIDATE_IP)){
			$ip = $forward;
		}else{
			$ip = $remote;
		}

		return $ip;
	}
	
	/**
	 * Получение настроек сайта в системе 1C-Битрикс
	 * 
	 * @param string $SITE_ID ID сайта. По-умолчанию - ID текущего сайта
	 * @return array Массив параметров сайта
	 */
	public static function getSite($SITE_ID = SITE_ID){
		$arSite = null;
		$obCache = new \CPHPCache();
		$cache_time = 3600;
		$cache_id = self::getModuleID().'_site_'.$SITE_ID;
		$cache_path = '/'.self::getModuleID().'/';
		if($obCache->InitCache($cache_time, $cache_id, $cache_path)){
		   $vars = $obCache->GetVars();
		   if (is_array($vars["arSite"]) && (count($vars["arSite"]) > 0)){
			   $arSite = $vars["arSite"];
		   }
		}elseif($obCache->StartDataCache()){
			$rsSites = \CSite::GetByID($SITE_ID);
			$arSite = $rsSites->Fetch();
			$obCache->EndDataCache(array('arSite'=>$arSite));// Сохраняем переменные в кэш.
		}
		
		return $arSite;
	}  
	
	/**
	 * Формирование строки копирайта для вывода в подвале
	 * В методе использеутся опция модуля "site_year", заполняемая в админке
	 * 
	 * @return string Отформатированный копирайт
	 */
	public static function getCopyright(){
		$startYear = \COption::GetOptionString(self::getModuleID(), 'site_year');
		if($startYear && !empty($startYear)){
			$currentYear = intval(date("Y"));
			$strYear = $currentYear;
			if($startYear < $currentYear){
				$strYear = $startYear . '-' . $strYear;
			}
		}else{
			$strYear = date('Y');
		}
		$arSite = self::getSite();
		$strResult = '© ' . $strYear . ' ' . $arSite['NAME'];
		//$strResult = $strYear;
		return $strResult;
	}
	
	/**
	 * Форматирование даты
	 * 
	 * Метод является обёрткой функции \FormatDate()
	 * 
	 * @param string $dateStr Дата в формате datetime
	 * @return type
	 */
	public static function formatDate($dateStr){
        return mb_strtolower(FormatDate('j F Y', MakeTimeStamp($dateStr), time()), "UTF-8");

	    /*return FormatDate(array(
			"tommorow" => "tommorow",
			"today" => "today",
			"yesterday" => "yesterday",
			"d" => 'j F',
			"" => 'j F Y',
			), MakeTimeStamp($dateStr), time()
		);*/
	}
	
	/**
	 * Метод форматирует интервал дат
	 * 
	 * @param string $dateFrom Начальная дата интервала в формате datetime
	 * @param type $dateTo Конечная дата интервала в формате datetime
	 * @return string Отформатированная строка интервала дат
	 */
	public static function formatDateInterval($dateFrom, $dateTo){
		$enc = 'UTF-8';
		$dateStr = '';
		$fromTime = MakeTimeStamp($dateFrom);
		$toTime = MakeTimeStamp($dateTo);
		$yearDiff = (date('Y', $fromTime) == date('Y', $toTime))?false:true;
		
		if(!empty($dateFrom) || !empty($dateTo)){
			
		
			if(!$dateFrom || empty($dateFrom)){		//	Не указана дата от
				$dateStr = "до ". mb_strtolower(FormatDate('j F', $toTime), $enc);
				$year = FormatDate('Y', $toTime);
				if($year != date('Y', time())){
					$dateStr .= " ".$year;
				}
			}elseif(!$dateTo || empty($dateTo)){	//	Не указана дата до
				$dateStr = "с ". mb_strtolower(FormatDate('j F', $fromTime), $enc);
				$year = FormatDate('Y', $fromTime);
				if($year != date('Y', time())){
					$dateStr .= " ".$year;
				}
			}elseif($fromTime == $toTime){			//	Даты совпадают
				$dateStr = mb_strtolower(FormatDate('j F', $fromTime), $enc);
				$year = FormatDate('Y', $fromTime);
				if($year != date('Y', time())){
					$dateStr .= " ".$year;
				}
			}elseif($yearDiff){						//	Различаются годы
				$dateStr = mb_strtolower(FormatDate('j F Y', $fromTime), 'UTF-8') . " - " . mb_strtolower(FormatDate('j F Y', $toTime), 'UTF-8');
			}else{
				$monthDiff = (date('m', $fromTime) == date('m', $toTime))?false:true;
				
				if($monthDiff){						//	Различаются месяцы
					$dateStr = mb_strtolower(FormatDate('j F', $fromTime), 'UTF-8') . " - " . mb_strtolower(FormatDate('j F', $toTime), 'UTF-8');
				}else{
					$dateStr = FormatDate('j', $fromTime) . " - " . FormatDate('j', $toTime) . " " . mb_strtolower(FormatDate('F', $fromTime), 'UTF-8');
				}
				
				$year = FormatDate('Y', $fromTime);
				if($year != date('Y', time())){
					$dateStr .= " ".$year;
				}
			}
		}
		
		return $dateStr;
	}
	
	
	
	/**
	 * Метод производит сколонение текста, относящегося к числу
	 * 
	 * Пример массива вариантов текста: array('язык', 'языка', 'языков')
	 * 
	 * @param int $number Число
	 * @param array|null $before Массив вариантов текста перед числом
	 * @param array|null $after Массив вариантов текста, следующегоза числом
	 * @param boolean $number_format Параметр отвечает за форматирование числа в формат "9 999 999"
	 * @return string Отформатированная строка
	 */
	public static function plural($number, $before=null, $after=null) {
		$cases = array(2,0,1,1,1,2);
		$resultStr = $number;
		if($before){
			$resultStr = $before[($number%100>4 && $number%100<20)? 2: $cases[min($number%10, 5)]].' '.$resultStr;
		}
		if($after){
			$resultStr = $resultStr.' '.$after[($number%100>4 && $number%100<20)? 2: $cases[min($number%10, 5)]];
		}
		return $resultStr;
	}
	
	/**
	 * Отправка POST запроса с использованием cURL
	 * 
	 * @param string $url Адрес запроса
	 * @param array $post Массив переменных для отправки POST-запросом
	 * @param array $options Дополнительные параметры cURL
	 * @return array Массив, содержащий статус запроса и ответ сервера
	 * @throws \RuntimeException
	 */
	public static function request($url, array $post = NULL, array $options = array()) 
	{ 
		$defaults = array( 
			CURLOPT_URL => $url, 
			CURLOPT_RETURNTRANSFER => 1, 
			CURLOPT_TIMEOUT => 4, 
			//CURLOPT_HEADER => 0, 
			//CURLOPT_FRESH_CONNECT => 1, 
			//CURLOPT_FORBID_REUSE => 1, 
			//CURLOPT_POSTFIELDS => http_build_query($post) 
		);
		
		if(!empty($post)){
			$defaults[CURLOPT_POSTFIELDS] = http_build_query($post);
		}

		$ch = curl_init();
		
		if(!empty($options)){
			foreach($options as $k => $v){
				$defaults[$k] = $v;
			}
		}
		
		curl_setopt_array($ch, $defaults);
		
		$response = curl_exec($ch);
        $error    = curl_error($ch);
        $errno    = curl_errno($ch);
		$status   = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		
		if (is_resource($ch)) {
            curl_close($ch);
        }

        if (0 !== $errno) {
            throw new \RuntimeException($error, $errno);
        }
		
		return array(
			'status' => $status,
			'response' => $response,
		); 
	}
/*
	public static function getAdditionalsArray ($arId) {
        $arFiles = [];
	    $arSelect = Array("IBLOCK_ID", "ID", "NAME", "DATE_ACTIVE_FROM");
        $arFilter = Array("IBLOCK_ID"=>\ItPeople\Site\Variables::FilesIB, "=ID"=>$arId, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y");
        $res = \CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);

        while($ob = $res->GetNextElement()) {
            $arFields = $ob->GetFields();
            $arFields['PROPERTIES'] = $ob->GetProperties();
            $fileId = $arFields['PROPERTIES']['FILE']['VALUE'];
            if(empty($fileId)) continue;    //  на всякий, антимусор

            $rsFile = \CFile::GetByID($fileId);
            $arFile = $rsFile->Fetch();
            $path = \CFile::GetPath($fileId);
            $fileinfo = pathinfo($_SERVER['DOCUMENT_ROOT'] . $path);


            $file = [
                'title' => (!empty($arFields['PROPERTIES']['DISPLAY_NAME']['VALUE']))?$arFields['PROPERTIES']['DISPLAY_NAME']['VALUE']:$arFields['NAME'],
                'type' => 'file',
                'img' => 'default',
                'href' => $path,
                'subtitle' => $subtitle = "Формат ." . $fileinfo['extension'] . ", " . \ItPeople\Site\Tools::bytesToSize($arFile['FILE_SIZE']),
                'description' => $arFields['~PREVIEW_TEXT'],
            ];

            $type = 'file';
            $img = 'default';
            //  ToDo Нужно ещё обработать видео
            if($fileinfo['extension']=='pdf'){
                $file['img'] = 'pdf';
            }elseif(\CFile::IsImage($arFile["FILE_NAME"], $arFile["CONTENT_TYPE"])){
                $file['type'] = 'img';
                $thumb = \CFile::ResizeImageGet($fileId, ['width'=>80, 'height'=>80], BX_RESIZE_IMAGE_PROPORTIONAL, true, [], false, 80);
                $file['img'] = $thumb['src'];

                $arSizeParams = [];
                $resolution = \ItPeople\Site\Tools::getImageDpi($_SERVER['DOCUMENT_ROOT'] . $path, $arFile['CONTENT_TYPE']);
                $arSizeParams[] = $arFile['WIDTH'].'x'.$arFile['HEIGHT'].' pix';
                $arSizeParams[] = $resolution['x'].' dpi';
                $file['subtitle'] .= ' | ' . implode(', ', $arSizeParams);
            }
            $arFiles[] = $file;
        }
		
		//echo "<pre>".var_export($arFiles, true)."</pre>";
        return $arFiles;
    }
*/
    /**
     * @param string $filename
     * @return array
     * @throws Exception
     */
    public static function getImageDpi($filename, $fileMime)
    {
        if (!empty($filename)
            && file_exists($filename)
        ) {
            //$fileMime = self::getFileMimeType($filename);

            if ($fileMime == 'image/jpeg'
                || $fileMime == 'image/jpg'
                || $fileMime == 'image/jpeg2'
            ) {
                return self::getImageJpgDpi($filename);
            } else if ($fileMime == 'image/png') {
                return self::getImagePngDpi($filename);
            } else {
                return array(
                    'x' => 72,
                    'y' => 72,
                );
            }

        } else {
            Throw new \Exception('Invalid parameters');
        }
    }

    /**
     * Uses unix command file -bi for determining file typ.
     *
     * jpeg = image/jpeg; charset=binary
     * gif = image/gif; charset=binary
     * pdf = application/pdf; charset=binary
     *
     * @static
     * @param string $absolutePath
     * @throws Exception
     * @return string|bool
     */
    public static function getFileMimeType($absolutePath)
    {
        if (!empty($absolutePath)) {
            if (file_exists($absolutePath)) {
                if ($return = exec(
                    'file -bi — ' . escapeshellarg($absolutePath))
                ) {
                    return $return;
                }
            }
        } else {
            Throw new Exception(
                'Invalid parameters for ' . __FUNCTION__
                                        . ' in ' . __FILE__);
        }
        return false;
    }

    /**
     * @param string $filename
     * @return array
     * @throws Exception
     */
    public static function getImageJpgDpi($filename)
    {
        if (!empty($filename)
            && file_exists($filename)
        ) {

            $dpi = 0;
            $fp = @fopen($filename, 'rb');

            if ($fp) {
                if (fseek($fp, 6) == 0)
                {
                    if (($bytes = fread($fp, 16)) !== false)
                    {
                        if (substr($bytes, 0, 4) == "JFIF")
                        {
                            $JFIF_density_unit = ord($bytes[7]);
                            $JFIF_X_density = ord($bytes[8])*256 + ord($bytes[9]);
                            $JFIF_Y_density = ord($bytes[10])*256 + ord($bytes[11]);

                            if ($JFIF_X_density == $JFIF_Y_density)
                            {
                                if ($JFIF_density_unit == 1) {
                                    $dpi = $JFIF_X_density;
                                } else if ($JFIF_density_unit == 2) {
                                    $dpi = $JFIF_X_density * 2.54;
                                }
                            }
                        }
                    }
                }
                fclose($fp);
            }

            if (empty($dpi)) {
                if ($exifDpi = self::getImageDpiFromExif($filename)) {
                    $dpi = $exifDpi;
                }
            }

            if (!empty($dpi)) {
                return array(
                    'x' => $dpi,
                    'y' => $dpi,
                );
            } else {
                return array(
                    'x' => 72,
                    'y' => 72,
                );
            }

        } else {
            Throw new \Exception('Invalid parameters');
        }
    }

    /**
     * @static
     * @param string $filename
     * @return array
     * @throws Exception
     */
    public static function getImagePngDpi($filename)
    {
        if (!empty($filename)
            && file_exists($filename)
        ) {

            $fh = fopen($filename, 'rb');

            if (!$fh) {
                return false;
            }

            $buf = array();

            $x = 0;
            $y = 0;
            $units = 0;

            while(!feof($fh))
            {
                array_push($buf, ord(fread($fh, 1)));
                if (count($buf) > 13)
                    array_shift($buf);
                if (count($buf) < 13)
                    continue;
                if ($buf[0] == ord('p') &&
                    $buf[1] == ord('H') &&
                    $buf[2] == ord('Y') &&
                    $buf[3] == ord('s'))
                {
                    $x = ($buf[4] << 24) + ($buf[5] << 16) + ($buf[6] << 8) + $buf[7];
                    $y = ($buf[8] << 24) + ($buf[9] << 16) + ($buf[10] << 8) + $buf[11];
                    $units = $buf[12];
                    break;
                }
            }

            fclose($fh);

            if ($x != false
                && $units == 1
            ) {
                $x = round($x * 0.0254);
            }

            if ($y != false
                && $units == 1
            ) {
                $y = round($y * 0.0254);
            }

            if (empty($x)
                && empty($y)
            ) {
                if ($exifDpi = self::getImageDpiFromExif($filename)) {
                    $x = $exifDpi;
                    $y = $exifDpi;
                }
            }

            if (!empty($x)
                || !empty($y)
            ) {
                return array(
                    'x' => $x,
                    'y' => $y,
                );
            } else {
                return array(
                    'x' => 72,
                    'y' => 72,
                );
            }

        } else {
            Throw new \Exception('Invalid parameters');
        }
    }

    /**
     * Read EXIF data.
     *
     * @static
     * @param string $filename
     * @throws \Exception
     * @return bool|float
     */
    public static function getImageDpiFromExif($filename)
    {

        if (!empty($filename)
            && file_exists($filename)
        ) {
            if (function_exists('exif_read_data')) {
                if ($exifData = exif_read_data($filename)) {
                    if (isset($exifData['XResolution'])) {
                        if (strpos($exifData['XResolution'], '/') !== false) {
                            if ($explode = explode('/', $exifData['XResolution'])) {
                                return (float) ((int) $explode[0] / (int) $explode[1]);
                            }
                        } else {
                            return (int) $exifData['XResolution'];
                        }
                    } else if (isset($exifData['YResolution'])) {
                        if (strpos($exifData['YResolution'], '/') !== false) {
                            if ($explode = explode('/', $exifData['YResolution'])) {
                                return (float) ((int) $explode[0] / (int) $explode[1]);
                            }
                        } else {
                            return (int) $exifData['YResolution'];
                        }
                    }
                }
            } else {
                Throw new \Exception('Incompatible system.');
            }
        } else {
            Throw new \Exception('Invalid parameters.');
        }

        return false;

    }

}