<?php

namespace app\modules\v1\controllers;

use Desin\Result;
use yii\web\Controller;

/**
 * Default controller for the `v1` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    /*public function actionIndex()
    {
        return $this->render('index');
    }*/

    public function actionError()
    {
      \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
      $result = new Result();
      $result->setError("Адрес не найден");
      $result->setResponseCode(404);
      return $result->getArray();
    }
}
