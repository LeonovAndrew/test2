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
use \ItPeople\Site as S;

/**
 * Класс содержит набор хелперов проекта
 */
class Helper {
	
	static $relatedDataFilters = [];
	
	/**
	 * Представление страницы по-умолчанию
	 * @return boolean
	 */
	function isDefaultPage(){
		/*if(
            //  Главная
            preg_match('/^\/(?:\?[\w=-_&]*)?$/i', S\Tools::getCurPage())
            || preg_match('/^\/search.*\/i', S\Tools::getCurPage())
			|| defined('ERROR_404')
		) return false;*/
		return true;
	}
	
	/**
	 * Метод проверяет доступные типы файлов по расширению для отображения иконки
	 * @param string $ext Расширение файла
	 * @return string Тип файла для отображения иконки
	 */
    public static function getFileTypeByExt ($ext = '') {
	    switch($ext){
		    case 'pdf':
			    $fileType = $ext;
			    break;
		    case 'doc':
		    case 'docx':
			    $fileType = 'doc';
			    break;
		    case 'xls':
		    case 'xlsx':
		        $fileType = 'xls';
		        break;
		    default:
			    $fileType = 'blank';
	    }
	    return $fileType;
    }
	
    public static function genPassword($len=10){
	    $chars="abcdefghijklnmopqrstuvwxyzABCDEFGHIJKLNMOPQRSTUVWXYZ0123456789";
	    $size=strlen($chars)-1;
		$password=null;
		while($len--)
		    $password.=$chars[rand(0,$size)];
		return $password;
    }
    
    /**
     * Метод возвращает массив для шаблона хлебных крошек
     */
    public static function getBreadcrumbs () {
        global $APPLICATION;
        $result = [];
        $arNavChain = self::getChainArray();
        $n=0; foreach($arNavChain as $item){ $n++;
            if($n==count($arNavChain)) break;
            $result[] = [
                'title' => $item['TITLE'],
                'link' => $item['LINK'],
            ];
        }
        return $result;
    }
	
    /**
     * Метод повторяет CMain::GetNavChain(), но возвращает данные в виде массива
     * @param bool $path
     * @param int $iNumFrom
     * @param bool $sNavChainPath
     * @param bool $bIncludeOnce
     * @param bool $bShowIcons
     * @return array
     */
    public static function getChainArray ($path=false, $iNumFrom=0, $sNavChainPath=false, $bIncludeOnce=false, $bShowIcons = true)
    {
        global $APPLICATION;
        \CMain::InitPathVars($site, $path);
        $DOC_ROOT = \CSite::GetSiteDocRoot($site);

        if($path===false)
            $path = $APPLICATION->GetCurDir();

        $arChain = array();
        $io = \CBXVirtualIo::GetInstance();

        while(true)//until the root
        {
            $path = rtrim($path, "/");

            $chain_file_name = $DOC_ROOT.$path."/.section.php";
            if($io->FileExists($chain_file_name))
            {
                $sChainTemplate = "";
                $sSectionName = "";
                include($io->GetPhysicalName($chain_file_name));
                if(strlen($sSectionName)>0)
                    $arChain[] = array("TITLE"=>$sSectionName, "LINK"=>$path."/");
            }

            if($path.'/' == SITE_DIR)
                break;

            if(strlen($path)<=0)
                break;

            //file or folder
            $pos = bxstrrpos($path, "/");
            if($pos===false)
                break;

            //parent folder
            $path = substr($path, 0, $pos+1);
        }

        $arChain = array_reverse($arChain);
        $arChain = array_merge($arChain, $APPLICATION->arAdditionalChain);
        if($iNumFrom>0)
            $arChain = array_slice($arChain, $iNumFrom);

        return $arChain;
    }

	public static function getMenuTree ($params) {
        global $APPLICATION;

        $paramsDefault = [
            "ALLOW_MULTI_SELECT" => "N",
            "CHILD_MENU_TYPE" => "left",
            "DELAY" => "N",
            "MAX_LEVEL" => "3",
            "MENU_CACHE_GET_VARS" => array(""),
            "MENU_CACHE_TIME" => "3600",
            "MENU_CACHE_TYPE" => "N",
            "MENU_CACHE_USE_GROUPS" => "Y",
            "ROOT_MENU_TYPE" => "top",
            "USE_EXT" => "Y",
            "RETURN" => "Y",
        ];

        $params = array_merge($paramsDefault, $params);
		
	    $arMenu = $APPLICATION->IncludeComponent("bitrix:menu", "", $params);
        $arMenuTree = self::createMenuTree($arMenu);

        //echo "<pre>".var_export($arMenuTree, true)."</pre>";

        return $arMenuTree;
    }

    private static function createMenuTree($arMenu){
        $tree = [/* [link, title, children, active] */];
        $parentId = 0;
        $previousId = 0;
        $previousLevel = 0;
        $lastParents = [0=>0];

        foreach($arMenu as $k => $item){
            $id = $k+1;

            $arItem = [
                'id' => $id,
                'title' => $item['TEXT'],
                'link' => $item['LINK'],
                'active' => $item['SELECTED']?true:false,
                'depth' => $item['DEPTH_LEVEL'],
                'params' => $item['PARAMS'],
            ];
            
            if(!empty($item['PARAMS'])){
            	foreach($item['PARAMS'] as $k=>$v){
		            if(!array_key_exists($k, $arItem)){
			            $arItem[$k] = $v;
		            }
	            }
            }
            
            if($arItem['blank'] == 'Y'){
	            $arItem['blank'] = true;
            }

            //  Как определить parentId?
            if($arItem['depth'] > $previousLevel){
                //  следующий уровень
                //  parentId равняется id предыдущего пункта
                $parentId = $previousId;
            }elseif($arItem['depth'] == $previousLevel){
                //  тот-же уровень
                //  parentId не изменился
            }elseif($arItem['depth'] < $previousLevel){
                //  какой-то из верхних уровней
                //  тут хз
                $parentDepth = ($arItem['depth'] > 1)?($arItem['depth']-1):0;
                $parentId = $lastParents[$parentDepth];
            }

            $arItem['parent_id'] = $parentId;

            //echo "<pre>".var_export($lastParents, true)."</pre>";
            //echo "<pre>".var_export($arItem, true)."</pre>";

            $tree[$id] = $arItem;
            $tree[$parentId]['children'][$id] = &$tree[$id];
            $previousLevel = $arItem['depth'];
            $previousId = $id;
            $lastParents[$arItem['depth']] = $id;
        }

        return $tree[0]['children'];
    }
	
	public static function addSystemVariables ($variables=[]) {
		$variables['isMobile'] = \ItPeople\Site\Tools::isMobile();
		$variables['isPhone'] = \ItPeople\Site\Tools::isPhone();
		$variables['isTablet'] = \ItPeople\Site\Tools::isTablet();
		$variables['isDesktop'] = \ItPeople\Site\Tools::isDesktop();
		
		return $variables;
	}
    
}