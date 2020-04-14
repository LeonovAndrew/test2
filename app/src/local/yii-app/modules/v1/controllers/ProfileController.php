<?php

namespace app\modules\v1\controllers;

use Bitrix\Iblock\ElementTable;
use Bitrix\Main\ArgumentException;
use Bitrix\Main\ArgumentNullException;
use Bitrix\Main\ArgumentOutOfRangeException;
use Bitrix\Main\Config\Option;
use Bitrix\Main\GroupTable;
use Bitrix\Main\Loader;
use Bitrix\Main\ObjectPropertyException;
use Bitrix\Main\SystemException;
use Bitrix\Main\UserTable;
use CGroup;
use CUser;
use Desin\Result;
use Yii;
use yii\filters\VerbFilter;
use yii\rest\Controller;
use yii\web\BadRequestHttpException;
use yii\web\Response;

/**
 * Class ProfileController
 * @package app\modules\v1\controllers
 */
class ProfileController extends Controller
{
    private $isAuthorized = false;
    private $userRoles = [
        'super',
        'coordinator',
        'hostess',
    ];
    private $userGroups = [];

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

    public function __construct($id, $module, $config = [])
    {
        parent::__construct($id, $module, $config);

        Loader::includeModule('iblock');

        global $USER;
        $this->isAuthorized = $USER->IsAuthorized();

        // существующие группы
        $rsGroups = GroupTable::getList(['filter' => ['ACTIVE' => 'Y']]);
        while ($userGroup = $rsGroups->fetch()) {
            if (!in_array($userGroup['STRING_ID'], $this->userRoles)) {
                continue;
            }
            $this->userGroups[$userGroup['ID']] = [
                'NAME' => $userGroup['NAME'],
                'CODE' => $userGroup['STRING_ID'],
            ];
        }
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

        if (!$this->isAuthorized
            && !in_array($action->id, ['login', 'logout'])
        ) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            $result = new Result();

            $result->setError('Пользователь не авторизован');

            $result->display();
        }

        return true;
    }

    public function actionIndex($id = false)
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $result = new Result();

        $params = [
            'order' => [
                'ID' => 'DESC',
            ],
            'filter' => [
                'ACTIVE' => 'Y',
            ],
            'select' => ['ID', 'NAME', 'ACTIVE', 'TITLE', 'UF_*'],
        ];

        if (!empty($id)) {
            $params['filter']['ID'] = $id;
        }

        // пользователи,согласно фильтру
        $userList = UserTable::getList($params);
        while ($u = $userList->fetch()) {
            $arGroups = CUser::GetUserGroup($u['ID']);

            $role = null;
            $resultGroup = array_values(array_intersect($arGroups, array_keys($this->userGroups)));
            if (is_array($resultGroup) && count($resultGroup) == 1) {
                $groupId = $resultGroup[0];
                $role = $this->userGroups[$groupId]['CODE'];
            }

            $data[] = [
                'id' => $u['ID'],
                'title' => $u['NAME'] ?? $u['TITLE'] ?? '',
                'role' => $role,
                'dcID' => $u['UF_DEALER_CENTER'] ?? 0,
            ];
        }

        if (empty($data)) {
            $result->setError("По условию запроса ничего не найдено");
        } else {
            $result->setSuccess($data);
        }

        return $result->getArray();
    }

    public function actionCurrent()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $result = new Result();

        global $USER;
        if (is_object($USER)) {
            $groupsIds = CUser::GetUserGroup($USER->GetID());
            foreach ($groupsIds as $groupId) {
                $group = CGroup::GetByID($groupId)->Fetch();
                if (in_array($group['STRING_ID'], $this->userRoles)) {
                    $role = $group['STRING_ID'];
                    break;
                }
            }

            $rsUser = CUser::GetByID($USER->GetID());
            $arUser = $rsUser->Fetch();
            $dcID = $arUser["UF_DEALER_CENTER"];

            if ($dcID) {
                $elementList = ElementTable::getList([
                    'filter' => [
                        'IBLOCK_ID' => Option::get('itpeople.site', 'ib_dealer'),
                        'ACTIVE' => 'Y',
                        'ID' => $dcID,
                    ],
                ]);

                $el = $elementList->fetch();
                $dcTitle = $el['NAME'];
            }

            $result->setSuccess([
                'id' => $USER->GetID(),
                'title' => $USER->GetFullName(),
                'role' => $role ?? '',
                'dcID' => $dcID ?: 0,
                'dcTitle' => $dcTitle ?? 'Hyundai',
                'sessionID' => session_id(),
            ]);

        } else {
            $result->setError('Пользователь не авторизован');
        }

        return $result->getArray();
    }

    /**
     * @return array
     * @throws ArgumentException
     * @throws ArgumentNullException
     * @throws ArgumentOutOfRangeException
     * @throws ObjectPropertyException
     * @throws SystemException
     */
    public function actionLogin()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $result = new Result();

        $login = Yii::$app->request->post('login');
        $password = Yii::$app->request->post('password');

        global $USER;
        if (!is_object($USER)) {
            $USER = new CUser;
        }
        $arAuthResult = $USER->Login($login, $password, 'Y');

        $groupsIds = CUser::GetUserGroup($USER->GetID());
        foreach ($groupsIds as $groupId) {
            $group = CGroup::GetByID($groupId)->Fetch();
            if (in_array($group['STRING_ID'], $this->userRoles)) {
                $role = $group['STRING_ID'];
                break;
            }
        }

        $rsUser = CUser::GetByID($USER->GetID());
        $arUser = $rsUser->Fetch();
        $dcID = $arUser["UF_DEALER_CENTER"];

        if ($dcID) {
            $elementList = ElementTable::getList([
                'filter' => [
                    'IBLOCK_ID' => Option::get('itpeople.site', 'ib_dealer'),
                    'ACTIVE' => 'Y',
                    'ID' => $dcID,
                ],
            ]);

            $el = $elementList->fetch();
            $dcTitle = $el['NAME'];
        }

        if ($arAuthResult === true) {
            $result->setSuccess([
                'id' => $USER->GetID(),
                'title' => $USER->GetFullName(),
                'role' => $role ?? '',
                'dcID' => $dcID ?: 0,
                'dcTitle' => $dcTitle ?? 'Hyundai',
                'sessionID' => session_id(),
            ]);

        } else {
            $result->setError('Неверный логин или пароль');
        }

        return $result->getArray();
    }

    public function actionLogout()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $result = new Result();

        global $USER;
        if (!is_object($USER)) {
            $USER = new CUser;
        }
        $USER->Logout();

        $result->setSuccess([
            'sessionId' => session_id(),
        ]);
        return $result->getArray();
    }
}
