<?
use Bitrix\Main\Loader;

IncludeModuleLangFile($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/options.php");
IncludeModuleLangFile(__FILE__);

Loader::includeModule("iblock");
Loader::includeModule("fileman");
Loader::includeModule("itpeople.site");
$module_id = \ItPeople\Site\Tools::getModuleID();

$arAllOptions = array(
	//"Основные настройки",
	//['site_year', 'Год создания сайта', '', ["text", 55]],
	/*"Согласие на обработку персональных данных",
	['agree_title', 'Заголовок правил', '', ['text', 55]],
	['agree_text', 'Текст правил', '', ['editor']],*/
	"ID инфоблоков",
//	['ib_dealer', 'ИБ Дилеры', '', ['text', 55]],
//	['ib_events', 'ИБ Событий', '', ['text', 55]],
);

$aTabs = array(
	array(
		"DIV" => "edit1",
		"TAB" => 'Импорт',
		"ICON" => "ib_settings",
		"TITLE" => "Основные настройки"
	),
);

if($USER->IsAdmin()){
	$aTabs[] = array(
		'DIV' => 'edit_access_tab',
		'TAB' => 'Права доступа',
		'ICON' => '',
		'TITLE' => 'Настройка прав доступа'
	);
}

$tabControl = new CAdminTabControl("tabControl", $aTabs);

if($REQUEST_METHOD=="POST" && strlen($Update.$Apply.$RestoreDefaults)>0 && check_bitrix_sessid())
{
    if ($_FILES && $_FILES['file']) {
        \ItPeople\Site\Tools::importPricelist($_FILES['file']);
    }

	if(strlen($RestoreDefaults)>0)
	{
		COption::RemoveOption($module_id);
	}
	else
	{
		
		foreach($arAllOptions as $arOption)
		{
			$name=$arOption[0];
			$val=$_REQUEST[$name];
			if($arOption[2][0]=="checkbox" && $val!="Y")
				$val="N";
			if($arOption[3][0]=="video" || $arOption[3][0]=="image"){
				$val = COption::GetOptionString($module_id, $arOption[0], $arOption[2]);
				if(!empty($_FILES[$name])){
					$image = $_FILES[$name];
					if(!empty($val)){
						$image["old_file"] = $val;
					}
					$image["MODULE_ID"] = $module_id;
					
					//echo "<pre>".var_export($image, true)."</pre>";
					//echo "<pre>".var_export($_FILES, true)."</pre>";
					
					if (strlen($image["name"])>0) {
						$fid = CFile::SaveFile($image, $module_id);
						if($fid > 0){
							$val = $fid;
						}
					}
				}
			}
			COption::SetOptionString($module_id, $name, $val, $arOption[1]);
		}
	}
	
	if($USER->IsAdmin()){
		CMain::DelGroupRight($module_id);
		$GROUP = $_REQUEST['GROUPS'];
		$RIGHT = $_REQUEST['RIGHTS'];
		
		foreach($GROUP as $k => $v) {
			if($k == 0) {
				COption::SetOptionString($module_id, 'GROUP_DEFAULT_RIGHT', $RIGHT[0], 'Right for groups by default');
			}
			else {
				CMain::SetGroupRight($module_id, $GROUP[$k], $RIGHT[$k], false);
			}
		}
	}
	
	/*if(strlen($Update)>0 && strlen($_REQUEST["back_url_settings"])>0){
		LocalRedirect($_REQUEST["back_url_settings"]);
	}else{
		LocalRedirect($APPLICATION->GetCurPage()."?mid=".urlencode($mid)."&lang=".urlencode(LANGUAGE_ID)."&back_url_settings=".urlencode($_REQUEST["back_url_settings"])."&".$tabControl->ActiveTabParam());
	}*/
}


$tabControl->Begin();
?>
<form method="post" action="<?echo $APPLICATION->GetCurPage()?>?mid=<?=urlencode($mid)?>&amp;lang=<?echo LANGUAGE_ID?>" enctype="multipart/form-data">
	<?=bitrix_sessid_post()?>
	<?$tabControl->BeginNextTab();?>
    <input type="file" name="file">
    <?
	foreach($arAllOptions as $arOption):
		$val = COption::GetOptionString($module_id, $arOption[0], $arOption[2]);
		$type = $arOption[3];
		//__AdmSettingsDrawRow($module_id, $arOption);
		?>
		<?if(is_string($arOption)):?>

	<?else:?>
        <tr>
            <td width="40%" nowrap <?if($type[0]=="textarea" || $type[0]=="editor" || $type[0]=="video" || $type[0]=="image") echo 'class="adm-detail-valign-top"'?>>
                <label for="<?echo htmlspecialcharsbx($arOption[0])?>"><?echo $arOption[1]?>:</label>
            <td width="60%">
				<?if($type[0]=="checkbox"):?>
                    <input type="checkbox" id="<?echo htmlspecialcharsbx($arOption[0])?>" name="<?echo htmlspecialcharsbx($arOption[0])?>" value="Y"<?if($val=="Y")echo" checked";?>>
				<?elseif($type[0]=="text"):?>
                    <input type="text" size="<?echo $type[1]?>" maxlength="255" value="<?echo htmlspecialcharsbx($val)?>" name="<?echo htmlspecialcharsbx($arOption[0])?>">
				<?elseif($type[0]=="textarea"):?>
                    <textarea cols="<?echo $type[1]?>" name="<?echo htmlspecialcharsbx($arOption[0])?>"><?echo htmlspecialcharsbx($val)?></textarea>
				<?elseif($type[0]=="editor"):?>
					<?CFileMan::AddHTMLEditorFrame(
						htmlspecialcharsbx($arOption[0]),
						htmlspecialcharsbx($val),
						"PREVIEW_TEXT_TYPE",
						"html",
						array(
							'height' => 450,
							'width' => '100%'
						),
						"N",
						0,
						"",
						"",
						false,
						true,
						false,
						array(
							'toolbarConfig' => 'admin',
							//'saveEditorKey' => $IBLOCK_ID,
							'hideTypeSelector' => "Y",
						)
					);?>
				<?elseif($type[0]=='ib'):?>
					<?=GetIBlockDropDownList($val, htmlspecialcharsbx($arOption[0])."_type", htmlspecialcharsbx($arOption[0]), false)?>
				<?elseif($type[0]=="video"):?>
					<?
					$path = '';
					if(!empty($val) && $val > 0):?>
						<?
						$path = CFile::GetPath($val);
						?>
                        <video src="<?=$path?>" preload="none" playisinline width="500" height="240" style="background-color:#3a3a3a;"></video><br><br>
					<?endif?>
                    <input type="file" name="<?echo htmlspecialcharsbx($arOption[0])?>" value="" />
				<?elseif($type[0]=="image"):?>
					<?
					$path = '';
					if(!empty($val) && $val > 0):?>
						<?
						$path = CFile::GetPath($val);
						$thumb = CFile::ResizeImageGet($val, array('width'=>200, 'height'=>200), BX_RESIZE_IMAGE_PROPORTIONAL, true);
						?>
                        <a target="_blank" href="<?=$path?>"><img src="<?=$thumb['src']?>" /></a><br><br>
					<?endif?>
                    <input type="file" name="<?echo htmlspecialcharsbx($arOption[0])?>" value="" />
				<?endif?>
            </td>
        </tr>
	<?endif?>
	<?endforeach?>
	
	<?
	if($USER->IsAdmin()){
		$tabControl->BeginNextTab();
		require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/admin/group_rights.php");
	}
	?>
	
	<?$tabControl->Buttons();?>
    <input type="submit" name="Update" value="<?=GetMessage("MAIN_SAVE")?>" title="<?=GetMessage("MAIN_OPT_SAVE_TITLE")?>" class="adm-btn-save">
    <input type="submit" name="Apply" value="<?=GetMessage("MAIN_OPT_APPLY")?>" title="<?=GetMessage("MAIN_OPT_APPLY_TITLE")?>">
	<?if(strlen($_REQUEST["back_url_settings"])>0):?>
        <input type="button" name="Cancel" value="<?=GetMessage("MAIN_OPT_CANCEL")?>" title="<?=GetMessage("MAIN_OPT_CANCEL_TITLE")?>" onclick="window.location='<?echo htmlspecialcharsbx(CUtil::addslashes($_REQUEST["back_url_settings"]))?>'">
        <input type="hidden" name="back_url_settings" value="<?=htmlspecialcharsbx($_REQUEST["back_url_settings"])?>">
	<?endif?>
	<?/*
	<input type="submit" name="RestoreDefaults" title="<?echo GetMessage("MAIN_HINT_RESTORE_DEFAULTS")?>" OnClick="return confirm('<?echo AddSlashes(GetMessage("MAIN_HINT_RESTORE_DEFAULTS_WARNING"))?>')" value="<?echo GetMessage("MAIN_RESTORE_DEFAULTS")?>">
	<?=bitrix_sessid_post();?>
	*/?>
	<?$tabControl->End();?>
</form>