<?php

namespace app\modules\v1\controllers;

use Bitrix\Iblock\ElementTable;
use Bitrix\Main\Config\Option;
use Desin\Result;
use Yii;
use yii\rest\Controller;
use Bitrix\Main\Loader;
use yii\web\Response;

/**
 * Class DealerController
 * @package app\modules\v1\controllers
 */
class DealerController extends Controller
{
    private $DEALER_IB_ID = null;
    private $isAuthorized = false;

    /**
     * {@inheritDoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => \yii\filters\VerbFilter::class,
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


    public function __construct($id, $module, $config = [])
    {
        parent::__construct($id, $module, $config);

        Loader::includeModule('iblock');
        $this->DEALER_IB_ID = Option::get('itpeople.site','ib_dealer');

        global $USER;
        $this->isAuthorized = $USER->IsAuthorized();

    }

    /**
     * Выполняется перед любым action
     * если пользователь не авторизован, запрет на выполнение action
     *
     * @param $action
     * @return bool
     * @throws \yii\web\BadRequestHttpException
     */
    public function beforeAction($action)
    {
        if (!parent::beforeAction($action)) {
            return false;
        }

        if(!$this->isAuthorized) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            $result = new Result();

            $result->setError('Пользователь не авторизован');

            $result->display();
        }

        return true;
    }

    public function actionIndex($id = false)
    {
//        echo "<pre>";
//        print_r($_REQUEST);
//        echo "</pre>";
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $result = new Result();

        $params = [
            'filter' => [
                'IBLOCK_ID' => $this->DEALER_IB_ID,
                'ACTIVE' => 'Y',
            ]
        ];

        if(!empty($id)) {
            $params['filter']['ID'] = $id;
        }
        if (!is_array($params['order']) || empty($params['order']))
            $params['order'] = ['ID' => 'ASC'];

        if (!is_array($params['filter']) || empty($params['filter']))
            return false;

        $elementList = ElementTable::getList($params);
        while ($el = $elementList->fetch()) {
            $data[] = [
                'id' => $el['ID'],
                'title' => $el['NAME'],
            ];
        }
        if(empty($data)) {
            $result->setError("По условию запроса ничего не найдено");
        } else {
            $result->setSuccess($data);
        }

        return $result->getArray();
    }
}
