<?php

namespace app\modules\v1\controllers;

use Desin\Result;
use yii\web\Controller;


class DefaultController extends Controller
{
    public function actionError()
    {
      \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
      $result = new Result();
      $result->setError("Адрес не найден");
      $result->setResponseCode(404);
      return $result->getArray();
    }
}
