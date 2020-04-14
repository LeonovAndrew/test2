<?php


namespace app\modules\v1\controllers;


use yii\filters\VerbFilter;
use yii\web\Controller;
use Desin\Result;

class PriceListController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'index' => ['GET'],
                ],
            ],

        ];
    }

    public function actionIndex()
    {
        $result = new Result();
        $langCode = \Yii::$app->request->get('lang');
        $data = [];

        if (!in_array($langCode, ['en', 'ch']) && $langCode) {
            $result->setError('Такого перевода нет');
            return $result->getJSON();
        }

        \Bitrix\Main\Loader::IncludeModule('iblock');
        $elRes = \CIBlockElement::GetList([], ['IBLOCK_CODE' => 'pricelist'], false, [], ["ID", "NAME", "PROPERTY_PRICE", "PROPERTY_CODE"]);

        $arFields = [];
        while($ob = $elRes->GetNextElement())
        {
            $fields = $ob->GetFields();
            $arFields[$fields['ID']] = [
                'name' => $fields["NAME"],
                'code' => $fields["PROPERTY_CODE_VALUE"],
                'price' => $fields["PROPERTY_PRICE_VALUE"],
            ];
        }

        if ($langCode && $langCode != 'ru') {

            \Bitrix\Main\Loader::includeModule("highloadblock");
            $hlblock = \Bitrix\Highloadblock\HighloadBlockTable::getList([
                'filter' => ['=NAME' => 'Translates']
            ])->fetch();
            $hlClassName = (\Bitrix\Highloadblock\HighloadBlockTable::compileEntity($hlblock))->getDataClass();

            $results = $hlClassName::getList(array(
                "select" => array("*"),
                "order" => array("ID"=>"DESC"),
                "filter" => Array("UF_CODE" => $langCode),
            ));

            while ($arRow = $results->Fetch())
            {
                $data[] = [
                    'name' => $arRow['UF_TRANSLATE'],
                    'code' => $arFields[$arRow['UF_ELEM']]['code'],
                    'price' => $arFields[$arRow['UF_ELEM']]['price']
                ];
            }

            $result->setSuccess($data);
            return $result->getJSON();
        }

        $result->setSuccess($arFields);
        return $result->getJSON();
    }
}