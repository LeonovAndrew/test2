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
        $elRes = \CIBlockElement::GetList([], ['IBLOCK_CODE' => 'pricelist'], false, [], ["IBLOCK_SECTION_ID", "ID", "NAME", "PROPERTY_PRICE", "PROPERTY_CODE"]);
        $secRes = \CIBlockSection::GetList([], ['IBLOCK_CODE' => 'pricelist'], false, ['NAME', "ID"], false);
        $arFields = [];
        $sections = [];
        while($section = $secRes->GetNext())
        {
            $sections[$section['ID']] = [
                'id' => $section['ID'],
                'name' => $section['NAME']
            ];
        }
        while($ob = $elRes->GetNextElement())
        {
            $fields = $ob->GetFields();

            $arFields[$fields['ID']] = [
                'name' => $fields["NAME"],
                'code' => $fields["PROPERTY_CODE_VALUE"],
                'price' => $fields["PROPERTY_PRICE_VALUE"],
                'category' => $fields['IBLOCK_SECTION_ID']
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
                    'price' => $arFields[$arRow['UF_ELEM']]['price'],
                    'category' => $arFields['SECTION_ID']
                ];
            }

            $data = $this->prepare($data, $sections);
            $result->setSuccess($data);
            return $result->getJSON();
        }

        $arFields = $this->prepare($arFields, $sections);
        $result->setSuccess($arFields);
        return $result->getJSON();
    }

    private function prepare($data = [], $sections = []) {
        $res = [];
        foreach ($data as $price) {
            $res[$sections[$price['category']]['id']]['data'][] = [
                'name' => $price['name'],
                'code' => $price['code'],
                'price' => $price['price'],
            ];
            $res[$sections[$price['category']]['id']]['name'] = $sections[$price['category']]['name'];
        }
        return $res;
    }
}