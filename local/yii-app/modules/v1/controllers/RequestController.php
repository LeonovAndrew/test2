<?php

namespace app\modules\v1\controllers;

use common\models\RequestFeedback;
use Desin\Result;

/**
 * Class RequestController
 * @package app\modules\v1\controllers
 */
class RequestController extends \yii\web\Controller
{
  /**
   * {@inheritDoc}
   */
  public function behaviors()
  {
    return [
      'verbs' => [
        'class' => \yii\filters\VerbFilter::className(),
        'actions' => [
          'index'  => ['GET', ''],
          'view'   => ['GET'],
          'create' => ['POST'],
          'update' => ['PUT'],
          'delete' => ['DELETE'],
        ],
      ],
    ];
  }

  public function actionIndex()
  {
    \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
    $result = new Result();
    $result->setError("Метод не поддерживается или неправильный запрос");
    return $result->getArray();
  }

  public function actionCreate()
  {
    \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
    $this->enableCsrfValidation = false;
    $result = new Result();

    $allowedParams = ['name', 'phone', 'email', 'text']; // Принимаемые параметры
    $attributes = array_intersect_key(\yii::$app->request->post(), array_flip($allowedParams));

    $request = new RequestFeedback();
    $request->setAttributes($attributes);

    if ($request->validate()) {
      $request->save();
      $result->setSuccess($request->getAttributes());
    } else {
      $result->setError(@implode("<br>", $request->getErrorSummary(true)));
      $result->setData($request->getErrors());
    }

    return $result->getArray();
  }

}
