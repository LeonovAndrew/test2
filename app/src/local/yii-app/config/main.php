<?php

use yii\helpers\VarDumper;

$params = array_merge(
  require __DIR__ . '/params.php'
);

if (!function_exists('dd')) {
    function dd()
    {
        foreach (func_get_args() as $var) {
            VarDumper::dump($var);
            echo PHP_EOL;
        }

        exit;
    }
}

return [
  'aliases' => [
    '@bower' => '@vendor/bower-asset',
    '@npm' => '@vendor/npm-asset',
  ],
  'language' => 'ru',
  'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
  'id' => 'api',
  'name' => 'IT PEOPLE',
  'basePath' => dirname(__DIR__),
  'bootstrap' => ['log'],
  //'controllerNamespace' => 'app\controllers',
  'components' => [
    'cache' => [
      'class' => 'yii\caching\FileCache',
    ],
    'request' => [
      'csrfParam' => '_csrf-api',
      'enableCsrfValidation' => false,
      'parsers' => [
        'application/json' => 'yii\web\JsonParser',
      ]
    ],
    'user' => [
      'identityClass' => 'common\models\User',
      'enableAutoLogin' => true,
      'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
    ],
    'session' => [
      // this is the name of the session cookie used for login on the frontend
      'name' => 'rest-api',
    ],
    'log' => [
      'traceLevel' => YII_DEBUG ? 3 : 0,
      'targets' => [
        [
          'class' => 'yii\log\FileTarget',
          'levels' => ['error', 'warning'],
        ],
      ],
    ],
    'errorHandler' => [
      'errorAction' => 'v1/default/error',
    ],
    'urlManager' => [
      'enablePrettyUrl' => true,
      'showScriptName' => false,
      'rules' => [
        'GET v1/events' => 'v1/events/index',
        'GET v1/events/<id:\d+>' => 'v1/events/view',
        'PUT v1/events/<id:\d+>' => 'v1/events/update',

        'GET v1/guests' => 'v1/guests/index',
        'POST v1/guests' => 'v1/guests/create',
        'GET v1/guests/<id:\d+>' => 'v1/guests/view',
        'PUT v1/guests/<id:\d+>' => 'v1/guests/update',
        'DELETE v1/guests/<id:\d+>' => 'v1/guests/delete',

        'POST v1/request' => 'v1/request/create',
        'GET v1/request' => 'v1/request/index', //  Не поддерживаемый метод
        'PUT, DELETE v1/request/<id:\d+>' => 'v1/request/index', //  Не поддерживаемый метод

        'GET v1/dealer/<id:\d+>' => 'v1/dealer/index',

        'GET v1/profile/<id:\d+>' => 'v1/profile/index',
        'POST v1/profile/login' => 'v1/profile/login',
        'POST v1/profile/logout' => 'v1/profile/logout',
        'POST v1/profile/current' => 'v1/profile/current',

        'GET v1/pricelist' => 'v1/price-list/index',
      ],
    ],
  ],
  'modules' => [
    'v1' => [
      'class' => 'app\modules\v1\Module',
    ],
  ],
  'params' => $params,
];
