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
class EventsController extends Controller
{
    private $EVENTS_IB_ID = null;
    private $DEALER_IB_ID = null;
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
     * @param array $config
     * @throws ArgumentNullException
     * @throws ArgumentOutOfRangeException
     * @throws LoaderException
     */
    public function __construct($id, $module, $config = [])
    {
        parent::__construct($id, $module, $config);

        Loader::includeModule('iblock');
        $this->EVENTS_IB_ID = Option::get('itpeople.site', 'ib_events');
        $this->DEALER_IB_ID = Option::get('itpeople.site', 'ib_dealer');
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

        $dcID = Yii::$app->request->get('dcID');

        $params = [
            'IBLOCK_ID' => $this->EVENTS_IB_ID,
        ];

        if ($dcID) {
            $params['PROPERTY_dcID'] = $dcID;
        }

        $rsElements = CIBlockElement::GetList([], $params);

        while ($el = $rsElements->GetNextElement()) {
            $arElement = $el->GetFields();
            $arElement['PROPERTIES'] = $el->GetProperties();

            $guestCount = CIBlockElement::GetList([], [
                'IBLOCK_ID' => $this->GUESTS_IB_ID,
                'PROPERTY_eventID' => $arElement['ID'],
            ], [], false, []);

            $data[] = [
                'id' => $arElement['ID'],
                'status' => $arElement['ACTIVE'] == 'Y' ? 'active' : 'not active',
                'title' => $arElement['PROPERTIES']['title']['VALUE'],
                'titleSecond' => $arElement['PROPERTIES']['titleSecond']['VALUE'],
                'mainReg' => $arElement['PROPERTIES']['mainReg']['VALUE'],
                'additionReg' => $arElement['PROPERTIES']['additionReg']['VALUE'],
                'registered' => $guestCount,
                'dcID' => $arElement['PROPERTIES']['dcID']['VALUE'],
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
            'IBLOCK_ID' => $this->EVENTS_IB_ID,
        ]);

        if ($el = $rsElements->GetNextElement()) {
            $arElement = $el->GetFields();
            $arElement['PROPERTIES'] = $el->GetProperties();

            $guestCount = CIBlockElement::GetList([], [
                'IBLOCK_ID' => $this->GUESTS_IB_ID,
                'PROPERTY_eventID' => $arElement['ID'],
            ], [], false, []);

            $data = [
                'id' => $arElement['ID'],
                'status' => $arElement['ACTIVE'] == 'Y' ? 'active' : 'not active',
                'title' => $arElement['PROPERTIES']['title']['VALUE'],
                'titleSecond' => $arElement['PROPERTIES']['titleSecond']['VALUE'],
                'mainReg' => $arElement['PROPERTIES']['mainReg']['VALUE'],
                'additionReg' => $arElement['PROPERTIES']['additionReg']['VALUE'],
                'registered' => $guestCount,
                'dcID' => $arElement['PROPERTIES']['dcID']['VALUE'],
            ];
        }

        if (empty($data)) {
            $result->setError('По условию запроса ничего не найдено');
        } else {
            $result->setSuccess($data);
        }

        return $result->getArray();
    }
}
