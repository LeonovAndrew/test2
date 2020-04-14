<?php

namespace app\modules\v1\controllers;

use Bitrix\Main\ArgumentNullException;
use Bitrix\Main\ArgumentOutOfRangeException;
use Bitrix\Main\Config\Option;
use Bitrix\Main\Loader;
use Bitrix\Main\LoaderException;
use CIBlockElement;
use Desin\Result;
use Yii;
use yii\filters\VerbFilter;
use yii\rest\Controller;
use yii\web\BadRequestHttpException;
use yii\web\Response;

/**
 * Class DealerController
 * @package app\modules\v1\controllers
 */
class GuestsController extends Controller
{
    private $EVENTS_IB_ID = null;
    private $GUESTS_IB_ID = null;
    private $isAuthorized = false;

    /**
     * {@inheritDoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'index' => ['GET', ''],
                    'view' => ['GET'],
                    'create' => ['POST'],
                    'update' => ['PUT'],
                    'delete' => ['DELETE'],
                ],
            ],

        ];
    }


    /**
     * EventsController constructor.
     * @param $id
     * @param $module
     * @param  array  $config
     * @throws ArgumentNullException
     * @throws ArgumentOutOfRangeException
     * @throws LoaderException
     */
    public function __construct($id, $module, $config = [])
    {
        parent::__construct($id, $module, $config);

        Loader::includeModule('iblock');
        $this->EVENTS_IB_ID = Option::get('itpeople.site', 'ib_events');
        $this->GUESTS_IB_ID = Option::get('itpeople.site', 'ib_guests');

        global $USER;
        $this->isAuthorized = $USER->IsAuthorized();
    }

    /**
     * Выполняется перед любым action
     * если пользователь не авторизован, запрет на выполнение action
     *
     * @param $action
     * @return bool
     * @throws BadRequestHttpException
     */
    public function beforeAction($action)
    {
        if (!parent::beforeAction($action)) {
            return false;
        }

        if (!$this->isAuthorized) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            $result = new Result();

            $result->setError('Пользователь не авторизован');

            $result->display();
        }

        return true;
    }

    public function actionIndex()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $result = new Result();

        $eventID = Yii::$app->request->get('eventID');

        $params = [
            'IBLOCK_ID' => $this->GUESTS_IB_ID,
        ];

        if ($eventID) {
            $params['PROPERTY_eventID'] = $eventID;
        }

        $rsElements = CIBlockElement::GetList([], $params);

        while ($el = $rsElements->GetNextElement()) {
            $arElement = $el->GetFields();
            $arElement['PROPERTIES'] = $el->GetProperties();
            $data[] = [
                'id' => $arElement['ID'],
                'surname' => $arElement['PROPERTIES']['surname']['VALUE'] ?: '',
                'name' => $arElement['PROPERTIES']['name']['VALUE'] ?: '',
                'patronymic' => $arElement['PROPERTIES']['patronymic']['VALUE'] ?: '',
                'phone' => $arElement['PROPERTIES']['phone']['VALUE'] ?: '',
                'email' => $arElement['PROPERTIES']['email']['VALUE'] ?: '',
                'gender' => $arElement['PROPERTIES']['gender']['VALUE'],
                'nameOldCar' => $arElement['PROPERTIES']['nameOldCar']['VALUE'] ?: '',
                'yearOldCar' => $arElement['PROPERTIES']['yearOldCar']['VALUE'] ?: '',
                'status' => $arElement['PROPERTIES']['status']['VALUE'],
                'eventID' => $arElement['PROPERTIES']['eventID']['VALUE'],
            ];
        }

        if (empty($data)) {
            $result->setError('По условию запроса ничего не найдено');
        } else {
            $result->setSuccess($data);
        }

        return $result->getArray();
    }

    public function actionView($id)
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $result = new Result();

        $rsElements = CIBlockElement::GetList([], [
            'ID' => $id,
            'IBLOCK_ID' => $this->GUESTS_IB_ID,
        ]);

        if ($el = $rsElements->GetNextElement()) {
            $arElement = $el->GetFields();
            $arElement['PROPERTIES'] = $el->GetProperties();
            $data = [
                'id' => $arElement['ID'],
                'surname' => $arElement['PROPERTIES']['surname']['VALUE'] ?: '',
                'name' => $arElement['PROPERTIES']['name']['VALUE'] ?: '',
                'patronymic' => $arElement['PROPERTIES']['patronymic']['VALUE'] ?: '',
                'phone' => $arElement['PROPERTIES']['phone']['VALUE'] ?: '',
                'email' => $arElement['PROPERTIES']['email']['VALUE'] ?: '',
                'gender' => $arElement['PROPERTIES']['gender']['VALUE'] ?: '',
                'nameOldCar' => $arElement['PROPERTIES']['nameOldCar']['VALUE'] ?: '',
                'yearOldCar' => $arElement['PROPERTIES']['yearOldCar']['VALUE'] ?: '',
                'status' => $arElement['PROPERTIES']['status']['VALUE'],
                'eventID' => $arElement['PROPERTIES']['eventID']['VALUE'],
            ];
        }

        if (empty($data)) {
            $result->setError('По условию запроса ничего не найдено');
        } else {
            $result->setSuccess($data);
        }

        return $result->getArray();
    }

    public function actionCreate()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $result = new Result();

        $data = Yii::$app->request->post();

        $el = new CIBlockElement();

        $arLoadProductArray = [
            "IBLOCK_ID" => $this->GUESTS_IB_ID,
            "PROPERTY_VALUES" => $data,
            "NAME" => ($data['surname'] ?? '') . ' ' . ($data['name'] ?? ''),
            "ACTIVE" => "Y",
        ];

        if ($PRODUCT_ID = $el->Add($arLoadProductArray)) {
            $result->setSuccess([
                'id' => $PRODUCT_ID,
            ]);
        } else {
            $result->setError($el->LAST_ERROR);
        }

        return $result->getArray();
    }

    public function actionUpdate($id)
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $result = new Result();

        $data = Yii::$app->request->post();

        $rsElements = CIBlockElement::GetList([], [
            'ID' => $id,
            'IBLOCK_ID' => $this->GUESTS_IB_ID,
        ]);

        if ($el = $rsElements->fetch()) {
            CIBlockElement::SetPropertyValuesEx($el['ID'], $this->GUESTS_IB_ID, $data);
        }

        $result->setSuccess([]);
        return $result->getArray();
    }

    public function actionDelete($id)
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $result = new Result();

        $rsElements = CIBlockElement::GetList([], [
            'ID' => $id,
            'IBLOCK_ID' => $this->GUESTS_IB_ID,
        ]);

        if ($el = $rsElements->fetch()) {
            CIBlockElement::Delete($el['ID']);
        }

        $result->setSuccess([]);
        return $result->getArray();
    }
}
