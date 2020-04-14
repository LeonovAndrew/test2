<?php
/**
 * Genesis PR
 *
 * @author Anton Desin anton.desin@gmail.com
 * @copyright (c) Anton Desin
 * @link https://desin.name
 */

namespace ItPeople\Site;

use Bitrix\Main\Type\DateTime;
use \ItPeople\Site\Constant;

class Request
{
	/**
	 * Объект результата
	 * @var \Desin\Result
	 */
	protected static $result;
	
	/**
	 * Инициализация API
	 */
	public static function initAPI () {
		\Bitrix\Main\Loader::includeModule('iblock');
		\ItPeople\Site\Constant::init();
		self::$result = new \Desin\Result();
		self::processRequest();
		self::$result->display();
	}
	
	public static function getSheduleAction ($request) {
		$shedule = [];
		$busySlots = [];
		
		$arFilter = Array(
			"IBLOCK_ID"=>Constant::IB_LEAD,
			"ACTIVE"=>"Y"
		);
		$res = \CIBlockElement::GetList(Array(), $arFilter, ['PROPERTY_DATETIME'], false, ["PROPERTY_DATETIME"]);
		while($arTime = $res->GetNext()){
			$date = \DateTime::createFromFormat('d.m.Y H:i:s', $arTime['PROPERTY_DATETIME_VALUE']);
			$busySlots[$date->format('d.m.Y')][$date->format('H:i')] = $arTime['CNT'];
			
		}
		
		$interval = new \DateInterval('P1D');
		$dateStart = Constant::$DATE_START;
		$dateNow = new \DateTime();
		if($dateNow > $dateStart){
			$dateStart = $dateNow;
		}
		$daterange = new \DatePeriod($dateStart, $interval, Constant::$DATE_END);
		
		foreach($daterange as $date){
			$strDate = $date->format("d.m.Y");
			
			foreach (Constant::SHEDULE_GRID['DEFAULT'] as $strTime){
				$dateSlot = \DateTime::createFromFormat('d.m.Y, H:i:s', $strDate.', '.$strTime.':00');
				if($dateNow >= $dateSlot) continue;
				
				$available = !isset($busySlots[$strDate][$strTime]) || $busySlots[$strDate][$strTime] < Constant::SLOTS;
				$slots = isset($busySlots[$strDate][$strTime])? (Constant::SLOTS - $busySlots[$strDate][$strTime]) : Constant::SLOTS;
				if($slots < 0) $slots = 0;
				
				$shedule[$strDate][$strTime] = [
					'available' => $available,
					'slots' => $slots,
				];
			}
		}
		self::$result->setSuccess($shedule);
	}

	public static function rejectRequestAction ($request) {
		$arRequest = null;
		$REQUEST_ID = (isset($request['id']))?intval($request['id']):null;
		
		if(!$REQUEST_ID){
			self::$result->setError('Неправильный запрос');
		}elseif(!\CSite::InGroup([1, Constant::USER_GROUP_HOSTES])){
			self::$result->setError('У вас нет прав для выполнения запроса');
		}else{
			$arFilter = Array(
				"IBLOCK_ID"=>Constant::IB_LEAD,
				"=ID" => $REQUEST_ID,
				"=PROPERTY_STATUS" => Constant::LEAD_STATUS_NEW
			);
			
			$res = \CIBlockElement::GetList(Array("SORT"=>"ASC", "NAME"=>"ASC"), $arFilter, false, false, ["ID", "IBLOCK_ID"]);
			if($obItem = $res->GetNextElement()){
				$arRequest = $obItem->GetFields();
				//$arRequest = array_merge($arRequest, $obItem->GetProperties());
				
				\CIBlockElement::SetPropertyValuesEx($arRequest['ID'], Constant::IB_LEAD, array("STATUS" => Constant::LEAD_STATUS_REJECT));
				self::$result->setSuccess();
			}else{
				self::$result->setError('Заявка не найдена');
			}
		}
	}
	
	/**
	 * Создание или обновление заявки
	 * @param $request (Array) Массив $_REQUEST
	 */
	public static function requestAction ($request) {
		global $USER;
		
		$arRequest = null;
		$REQUEST_ID = (isset($request['id']))?intval($request['id']):null;
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
				$date = new \DateTime($arRequest['DATETIME']['VALUE']);
				$arRequest['TIME'] = $date->format('H:i');
			}
		}
		
		
		//  Проверка даты
		$requestDate = \DateTime::createFromFormat('d.m.Y', $request['date']);
		
		if(!$requestDate){
			self::$result->setError('Некорректная дата');
		}
		if(!self::$result->isError() && ($requestDate < Constant::$DATE_START || $requestDate > Constant::$DATE_END)){
			self::$result->setError('Указанной даты нет в расписании');
		}
		//  Проверка времени
		if(!self::$result->isError() && !in_array($request['time'], Constant::SHEDULE_GRID['DEFAULT'])){
			self::$result->setError('Указанного времени нет в расписании');
		}elseif(!self::$result->isError()){
			$arTime = explode(":", $request['time']);
			$requestDate->setTime($arTime[0], $arTime[1], '00');
			
			//  Проверка свободного слота
			if(!$arRequest || $arRequest['TIME'] !== $request['time']){
				$arSelect = Array("ID", "IBLOCK_ID");
				$arFilter = Array(
					"IBLOCK_ID"=>Constant::IB_LEAD,
					">=PROPERTY_DATETIME" => $requestDate->format('Y-m-d H:i:s'),
					"<=PROPERTY_DATETIME" => $requestDate->format('Y-m-d H:i:s'),
					"ACTIVE"=>"Y"
				);
				$res = \CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
				
				if($res->SelectedRowsCount() >= Constant::SLOTS){
					self::$result->setError('Указанное время уже занято');
				}
			}
			
		}
		
		//  Проверка полей хостес и координатора
		if(\CSite::InGroup([Constant::USER_GROUP_HOSTES, Constant::USER_GROUP_COORD])){
			if(empty($request['city'])){
				self::$result->setError('Введите город');
			}
			if(empty($request['sale'])){
				self::$result->setError('Выберите менеджера');
			}
			if(empty($request['gender'])){
				self::$result->setError('Укажите пол посетителя');
			}
			if(empty($request['type'])){
				self::$result->setError('Укажите тип заявки');
			}
		}
		
		//  Проверка полей только координатора
		if(\CSite::InGroup([Constant::USER_GROUP_COORD])){
			if(empty($request['model_interest'])){
				self::$result->setError('Выберите модели автомобиля, которыми интересовался посетитель');
			}
			if(empty($request['model']) && !empty($request['tesdrive_role'])){
				self::$result->setError('Выберите модель автомобиля проведённого тест-драйва');
			}
			if(!empty($request['model']) && empty($request['tesdrive_role'])){
				self::$result->setError('Выберите роль посетителя при проведении тест-драйва');
			}
			if(empty($request['client_type'])){
				self::$result->setError('Выберите тип клиента');
			}
		}
		
		if(self::$result->isError()){
			return;
		}
		
		$el = new \CIBlockElement;
		
		$PROP = array();
		$PROP['STATUS'] = Constant::LEAD_STATUS_NEW;
		if(\CSite::InGroup([Constant::USER_GROUP_HOSTES])){
			
			
			$PROP['STATUS'] = Constant::LEAD_STATUS_NEW;
		}elseif(\CSite::InGroup([Constant::USER_GROUP_COORD])){
			$PROP['STATUS'] = Constant::LEAD_STATUS_FINISHED;
		}
		if($request['action'] == 'create_lead'){
			$PROP['STATUS'] = Constant::LEAD_STATUS_LEAD;
		}
		
		$PROP['DATETIME'] = $requestDate->format('d.m.Y H:i:s');
		$PROP['SURNAME'] = htmlspecialcharsbx($request['surname']);
		$PROP['NAME'] = htmlspecialcharsbx($request['name']);
		$PROP['PATRONYMIC'] = htmlspecialcharsbx($request['patronymic']);
		$PROP['PHONE'] = htmlspecialcharsbx($request['phone']);
		$PROP['EMAIL'] = htmlspecialcharsbx($request['email']);
		
		if(!empty($request['model_interest']) && is_array($request['model_interest'])){
			foreach($request['model_interest'] as $k => $v){
				$request['model_interest'][$k] = htmlspecialcharsbx($v);
			}
			$PROP['MODEL_INTEREST'] = $request['model_interest'];
		}
		if(!empty($request['model'])){
			$PROP['MODEL'] = htmlspecialcharsbx($request['model']);
		}
		if(!empty($request['tesdrive_role']) && is_array($request['tesdrive_role'])){
			foreach($request['tesdrive_role'] as $k => $v){
				$request['tesdrive_role'][$k] = htmlspecialcharsbx($v);
			}
			$PROP['TESTDRIVE_ROLE'] = $request['tesdrive_role'];
		}
		if(!empty($request['type']) && is_array($request['type']) > 0){
			foreach($request['type'] as $k => $v){
				$request['type'][$k] = htmlspecialcharsbx($v);
			}
			$PROP['TYPE'] = $request['type'];
		}
		if(!empty($request['city'])){
			$PROP['CITY'] = htmlspecialcharsbx($request['city']);
		}
		if(!empty($request['sale']) && is_numeric($request['sale']) > 0){
			$PROP['SALE'] = intval($request['sale']);
		}
		if(!empty($request['gender']) && is_numeric($request['gender']) > 0){
			$PROP['GENDER'] = intval($request['gender']);
		}
		if(!empty($request['client_type'])){
			$PROP['CLIENT_TYPE'] = htmlspecialcharsbx($request['client_type']);
		}
		
		if(!empty($request['question']) && is_array($request['question'])){
			foreach($request['question'] as $code => $value){
				$PROP[$code] = htmlspecialcharsbx($value);
			}
		}
		
		$arLoadProductArray = Array(
			"MODIFIED_BY"    => $USER->GetID(),
			"IBLOCK_ID"      => \ItPeople\Site\Constant::IB_LEAD,
			"NAME"           => "Лид",
			"ACTIVE"         => "Y",
			"PROPERTY_VALUES"=> $PROP,
		);
		
		if(\CSite::InGroup([1, Constant::USER_GROUP_HOSTES, Constant::USER_GROUP_COORD]) && $arRequest){
			if($el->Update($arRequest['ID'], $arLoadProductArray)){
				self::$result->setSuccess([
					'requestId'=>$arRequest['ID'],
					'added' => false,
					'updated'=>true,
					'status'=>$PROP['STATUS']
				]);
			}else{
				self::$result->setError($el->LAST_ERROR);
			}
		}else{
			if($reqId = $el->Add($arLoadProductArray)){
				//  Отправляем СМС
				$smsLogin = \Bitrix\Main\Config\Option::get('itpeople.site', 'sms_login');
				$smsPassword = \Bitrix\Main\Config\Option::get('itpeople.site', 'sms_password');
				$messageText = "Ждем вас в Genesis Lounge {$requestDate->format('d.m.Y в H:i')}. Ресепшен +78007775051";
				$phone = preg_replace('/[^+\d]+/', '', $PROP['PHONE']);
				$smsc = new \SMSCenter\SMSCenter($smsLogin, $smsPassword, true);
				$sendRes = $smsc->send($phone, $messageText, 'GENESIS');
				
				\CEvent::SendImmediate('NEW_REQUEST', 's1', [
					'DATE' => $requestDate->format('d.m.Y'),
					'TIME' => $requestDate->format('H:i'),
					'EMAIL' => $PROP['EMAIL'],
				]);
				
				self::$result->setSuccess([
					'requestId'=>$reqId,
					'added'=>true,
					'updated'=>true,
					'status'=>$PROP['STATUS'],
					'sms_sended'=>$sendRes,
				]);
				
			} else {
				self::$result->setError($el->LAST_ERROR);
			}
		}
	}
	
	/**
	 * Обработка запроса. Метод проверяет существование метода, переданного в запросе и выполняет его
	 */
	protected static function processRequest () {
		$method = htmlspecialcharsbx($_GET['method']);
		$method = $method . 'Action';
		
		if(method_exists(self::class, $method)){
			self::{$method}($_REQUEST);
		}else{
			self::$result->setError("Неподдерживаемый метод");
		}
	}
}