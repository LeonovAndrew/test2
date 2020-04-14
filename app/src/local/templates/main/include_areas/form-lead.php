<?php
/**
 * Genesis Showroom
 *
 * @author Anton Desin anton.desin@gmail.com
 * @copyright (c) Anton Desin
 * @link https://desin.name
 */

use \ItPeople\Site\Constant;

$arResult = [];

\Bitrix\Main\Loader::includeModule('iblock');

\ItPeople\Site\Tools::compileEntityByName('Model');
\ItPeople\Site\Tools::compileEntityByName('ClientType');
\ItPeople\Site\Tools::compileEntityByName('RequestType');
\ItPeople\Site\Tools::compileEntityByName('TestdriveRole');


$arRequest = null;
$REQUEST_ID = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
if($REQUEST_ID && \CSite::InGroup([1, Constant::USER_GROUP_HOSTES, Constant::USER_GROUP_COORD])){
	$arFilter = Array(
		"IBLOCK_ID"=>Constant::IB_LEAD,
		"=ID" => $REQUEST_ID,
		//
	);
	if(\CSite::InGroup([Constant::USER_GROUP_HOSTES])){
		$arFilter["=PROPERTY_STATUS"] = Constant::LEAD_STATUS_NEW;
	}elseif(\CSite::InGroup([Constant::USER_GROUP_COORD])){
		$arFilter["=PROPERTY_STATUS"] = [Constant::LEAD_STATUS_LEAD, Constant::LEAD_STATUS_FINISHED];
	}elseif(\CSite::InGroup([1])){
		$arFilter["=PROPERTY_STATUS"] = [Constant::LEAD_STATUS_NEW, Constant::LEAD_STATUS_LEAD, Constant::LEAD_STATUS_FINISHED];;
	}
	
	$res = \CIBlockElement::GetList(Array("SORT"=>"ASC", "NAME"=>"ASC"), $arFilter, false, false, ["ID", "IBLOCK_ID"]);
	if($obItem = $res->GetNextElement()){
		$arRequest = $obItem->GetFields();
		$arRequest = array_merge($arRequest, $obItem->GetProperties());
	}
}

$models = \ModelTable::getList()->fetchAll();
$clientTypes = \ClientTypeTable::getList()->fetchAll();
$requestType = \RequestTypeTable::getList()->fetchAll();
$testdriveRoles = \TestdriveRoleTable::getList()->fetchAll();

$arResult['MANAGERS'] = [];
$arFilter = Array(
	"IBLOCK_ID"=>Constant::IB_SALE,
	"ACTIVE"=>"Y"
);
$res = \CIBlockElement::GetList(Array("SORT"=>"ASC", "NAME"=>"ASC"), $arFilter, false, false, ["ID", "NAME"]);
while($arItem = $res->GetNext()){
	$arResult['MANAGERS'][] = $arItem;
}

$arQuestions = [];

if(\CSite::InGroup([1, Constant::USER_GROUP_COORD])){
	$obProps = CIBlockProperty::GetList(["sort"=>"asc", "name"=>"asc"], [
		"ACTIVE" => "Y",
		"IBLOCK_ID" => Constant::IB_LEAD,
		"CODE" => "QUESTION_%",
		"PROPERTY_TYPE" => "S",
	]);
	while ($arProp = $obProps->GetNext()){
		$arQuestions[$arProp['CODE']] = $arProp;
	}
}



$USER_GROUPS = $USER->GetGroups();
?><form action="/" method="post" id="addTestDriveFrom">
	<?if($arRequest):?>
		<input type="hidden" name="id" value="<?=$arRequest['ID']?>">
	<?endif?>
	
	<?if(\CSite::InGroup([1, Constant::USER_GROUP_COORD])):?>
	<div class="section sectionInterestModel">
		<div class="sectionInterestModel__title">Интерес к моделям:</div>
		<div class="sectionInterestModel__wrap">
			<?foreach($models as $modelItem):?>
				<div class="sectionInterestModel__item">
					<label>
						<input type="checkbox" name="model_interest[]" value="<?=$modelItem['UF_XML_ID']?>" <?if($arRequest && in_array($modelItem['UF_XML_ID'], $arRequest['MODEL_INTEREST']['VALUE'])):?>checked<?endif?>/>
						<span><?=$modelItem['UF_NAME']?></span>
					</label>
				</div>
			<?endforeach?>
		</div>
	</div>
	<?endif?>
	
	<?if(\CSite::InGroup([1, Constant::USER_GROUP_COORD])):?>
	<div class="section section--noBorder section--withHalfBorder sectionChooseCar">
		<div class="sectionChooseCar__wrap">
			<div class="sectionChooseCar__image"><img style="transition: all .3s ease; opacity:0;" src="" alt="Car" /></div>
			<div class="sectionChooseCar__select"><select name="model">
					<option value="" checked="checked">Не было тест-драйва</option>
					<?foreach($models as $modelItem):?>
						<option value="<?=$modelItem['UF_XML_ID']?>" data-image="<?=\CFile::GetPath($modelItem['UF_IMAGE'])?>" <?if($arRequest && $modelItem['UF_XML_ID'] == $arRequest['MODEL']['VALUE']):?>selected<?endif?>>Тест-драйв <?=$modelItem['UF_NAME']?></option>
					<?endforeach?>
				</select></div>
		</div>
	</div>
	<?endif?>
	
	<div class="section sectionDate" id="dateTimeSelect">
		<input type="hidden" name="date" value="<?=($arRequest?FormatDate('d.m.Y', MakeTimeStamp($arRequest['DATETIME']['VALUE'])):'')?>">
		
		<div class="sectionDate__title">Выберите дату посещения:</div>
		<div class="sectionDate__wrap">
			<div class="sectionDate__item">
				<select name="month" data-error="Месяца">
					<option value="">Выберите месяц</option>
				</select>
			</div>
			<div class="sectionDate__item">
				<select name="day" data-error="Дня">
					<option value="">Выберите день</option>
				</select>
			</div>
			<div class="sectionDate__item">
				<select name="time" data-error="Времени" <?=($arRequest?'data-value='.FormatDate('H:i', MakeTimeStamp($arRequest['DATETIME']['VALUE'])):'')?>>
					<option value="">Выберите время</option>
				</select>
			</div>
		</div>
	</div>
	
	<div class="section sectionDilllerManager">
		<div class="sectionDilllerManager__wrap">
			<div class="sectionDilllerManager__item">
				<div class="sectionDilllerManager__itemLabel">В каком городе вам удобно было бы посетить дилерский центр?</div>
				<input id="address" name="city" type="text" value="<?=($arRequest?$arRequest['CITY']['VALUE']:'')?>" placeholder="Введите город" data-error="Введите город" />
			</div>
			<div class="sectionDilllerManager__item">
				<select name="sale" data-error="Выберите менеджера">
					<option value="" disabled>Выбор менеджера</option>
					<?foreach($arResult['MANAGERS'] as $arItem):?>
						<option value="<?=$arItem['ID']?>" <?if($arRequest && $arItem['ID'] == $arRequest['SALE']['VALUE']):?>selected<?endif?>><?=$arItem['NAME']?></option>
					<?endforeach?>
				</select>
			</div>
		</div>
	</div>
	
	<div class="section sectionChooseUser sectionChooseUser--gender">
		<div class="sectionChooseUser__wrap">
			<div class="sectionChooseUser__item">
				<label>
					<input type="radio" name="gender" value="<?=Constant::GENDER_MALE?>" <?if($arRequest && $arRequest['GENDER']['VALUE_ENUM_ID'] == Constant::GENDER_MALE):?>checked<?endif?> />
					<span>Уважаемый</span>
				</label>
			</div>
			<div class="sectionChooseUser__item">
				<label>
					<input type="radio" name="gender" value="<?=Constant::GENDER_FEMALE?>" <?if($arRequest && $arRequest['GENDER']['VALUE_ENUM_ID'] == Constant::GENDER_FEMALE):?>checked<?endif?> />
					<span>Уважаемая</span>
				</label>
			</div>
		</div>
	</div>
	
	<div class="section section--noBorder section--withHalfBorder sectionFio">
		<div class="sectionFio__wrap">
			<div class="sectionFio__item">
				<input type="text" name="surname" value="<?=($arRequest?$arRequest['SURNAME']['VALUE']:'')?>" placeholder="Фамилия" class="capitalize" data-error="Введите Фамилию" />
			</div>
			<div class="sectionFio__item">
				<input type="text" name="name" value="<?=($arRequest?$arRequest['NAME']['VALUE']:'')?>" placeholder="Имя" class="capitalize center" data-error="Введите Имя" />
			</div>
			<div class="sectionFio__item">
				<input type="text" value="<?=($arRequest?$arRequest['PATRONYMIC']['VALUE']:'')?>" name="patronymic" placeholder="Отчество" class="capitalize center" data-error="Введите Отчество" />
			</div>
		</div>
	</div>
	
	<div class="section sectionTelEmail">
		<div class="sectionTelEmail__wrap">
			<div class="sectionTelEmail__item">
				<input type="tel" name="phone" value="<?=($arRequest?$arRequest['PHONE']['VALUE']:'')?>" placeholder="Телефон" class="phoneNumber" data-error="Введите Телефон" />
			</div>
			<div class="sectionTelEmail__item">
				<input class="center" type="email" value="<?=($arRequest?$arRequest['EMAIL']['VALUE']:'')?>" name="email" placeholder="E-mail" data-error="Введите E-mail" />
			</div>
		</div>
	</div>
	
	<?if(\CSite::InGroup([1, Constant::USER_GROUP_COORD])):?>
	<div class="section sectionTypeTestDrive">
		<div class="sectionTypeTestDrive__title">Вид тест-драйва:</div>
		<div class="sectionTypeTestDrive__wrap">
			<?foreach($testdriveRoles as $roleItem):?>
				<div class="sectionTypeTestDrive__item">
					<label>
						<input type="checkbox" name="tesdrive_role[]" value="<?=$roleItem['UF_XML_ID']?>" <?if($arRequest && in_array($roleItem['UF_XML_ID'], $arRequest['TESTDRIVE_ROLE']['VALUE'])):?>checked<?endif?>/>
						<span><?=$roleItem['UF_NAME']?></span>
					</label>
				</div>
			<?endforeach?>
		</div>
	</div>
	
	<div class="section sectionTypeClient">
		<div class="sectionTypeClient__title">Тип клиента:</div>
		<div class="sectionTypeClient__wrap">
			<div class="sectionTypeClient__item">
				<select name="client_type" data-error="Выберите тип клиента">
					<option value="">Выберите тип клиента</option>
					<?foreach($clientTypes as $typeItem):?>
						<option value="<?=$typeItem['UF_XML_ID']?>" <?if($arRequest && $typeItem['UF_XML_ID'] == $arRequest['CLIENT_TYPE']['VALUE']):?>selected<?endif?>><?=$typeItem['UF_NAME']?></option>
					<?endforeach?>
				</select>
			</div>
		</div>
	</div>
	
		<?if(!empty($arQuestions)):?>
			<div class="section sectionComment">
				<div class="sectionComment__title">Отчет координатора:</div>
				<div class="sectionComment__wrap">
					<?foreach($arQuestions as $qItem):
						$value = $arRequest ? $arRequest[$qItem['CODE']]['VALUE'] : '';
						?>
						<div class="sectionComment__item">
							<textarea rows="2" name="question[<?=$qItem['CODE']?>]" placeholder="<?=$qItem['NAME']?>"><?=$value?></textarea>
						</div>
					<?endforeach?>
				</div>
			</div>
		<?endif?>
	<?endif?>
	
	<div class="section section--noBorder sectionFormPageSubmit">
		<div class="sectionFormPageSubmit__wrap">
			<div class="sectionFormPageSubmit__item sectionFormPageSubmitSetting">
				<?foreach($requestType as $typeItem):?>
					<div class="sectionFormPageSubmitSetting__item">
						<label>
							<input type="checkbox" name="type[]" value="<?=$typeItem['UF_XML_ID']?>" <?if($arRequest && in_array($typeItem['UF_XML_ID'], $arRequest['TYPE']['VALUE'])):?>checked<?endif?>/>
							<span><?=$typeItem['UF_NAME']?></span>
						</label>
					</div>
				<?endforeach?>
			</div>
			
			<input type="hidden" name="action" value="">
			
			<?if(\CSite::InGroup([1, Constant::USER_GROUP_HOSTES])):?>
				<div class="sectionFormPageSubmit__item sectionFormPageSubmit__submit">
					<button class="btn" data-valid="0" type="submit" name="submit" name="submit_action" value="save">Сохранить</button>
					<div class="submitProgress"></div>
				</div>
				<div class="sectionFormPageSubmit__item sectionFormPageSubmit__submit">
					<button class="btn" data-valid="0" type="submit" name="submit_action" value="create_lead">Передать координатору</button>
					<div class="submitProgress"></div>
				</div>
			<?else:?>
				<div class="sectionFormPageSubmit__item sectionFormPageSubmit__submit">
					&nbsp;
				</div>
				<div class="sectionFormPageSubmit__item sectionFormPageSubmit__submit">
					<button class="btn" data-valid="0" type="submit" name="submit" name="submit_action" value="save">Сохранить</button>
					<div class="submitProgress"></div>
				</div>
			<?endif?>
		</div>
	</div>

</form>