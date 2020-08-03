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
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $result = new Result();
        $langCode = \Yii::$app->request->get('lang');
        $tag = \Yii::$app->request->get('tag');
        $translates = [];

//        if (!in_array($langCode, ['en', 'ch']) && $langCode) {
//            $result->setError('Такого перевода нет');
//            return $result->getJSON();
//        }

        \Bitrix\Main\Loader::IncludeModule('iblock');
        if ($tag) {
            $tag = explode(',', $tag);
            $tagsForSearch = [];
            foreach ($tag as $tagItem) {
                $tagsForSearch[] = trim($tagItem);
            }

            $tags = \CIBlockElement::GetList([], ['IBLOCK_CODE' => 'tags', 'NAME'=>$tagsForSearch], false, [], ["*"]);
            $sections = [];
            $services = [];
            while ($tag = $tags->GetNextElement()) {
                $sectionsItems[] = $tag->GetProperties()['CODE']['VALUE'];
                $servicesItems[] = $tag->GetProperties()['SERVICE_CODE']['VALUE'];
            }

            foreach ($sectionsItems as $section) {
                foreach ($section as $item) {
                    $sections[] = $item;
                }
            }

            foreach ($servicesItems as $service) {
                foreach ($service as $item) {
                    $services[] = $item;
                }
            }

            $secRes = \CIBlockSection::GetList([], ['IBLOCK_CODE' => 'pricelist', 'NAME'=>$sections], false, ['NAME', "ID"], false);
            $secs = [];
            while($sec = $secRes->GetNext()) {
                $secs[] = $sec['ID'];
            }


            if ($sections != null && $services != null) {

                $elFilter = ['IBLOCK_CODE' => 'pricelist', [
                    "LOGIC" => "OR",
                    ['IBLOCK_SECTION_ID' => $secs],
                    ["PROPERTY_CODE" => $services]
                ]];
            } elseif ($sections != null && $services == null) {
                $elFilter = ['IBLOCK_CODE' => 'pricelist', 'IBLOCK_SECTION_ID' => $secs];
            } elseif ($sections == null && $services != null)  {
                $elFilter = ['IBLOCK_CODE' => 'pricelist', 'PROPERTY_CODE' => $services];
            } else {
                $result->setError('По тегу ничего не найдено');
                return $result->getArray();
            }

        } else {
            $elFilter = ['IBLOCK_CODE' => 'pricelist'];
        }
        $elRes = \CIBlockElement::GetList([], $elFilter, false, [], ["IBLOCK_SECTION_ID", "ID", "NAME", "PROPERTY_PRICE", "PROPERTY_CODE"]);
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

            $arFields[$fields['PROPERTY_CODE_VALUE']] = [
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

                $el = \CIBlockElement::GetList([], ['IBLOCK_CODE' => 'pricelist', 'PROPERTY_CODE' => $arRow['UF_SERVICE_CODE']], false, [], ["PROPERTY_CODE"])->GetNext();
                $translates[$el["PROPERTY_CODE_VALUE"]] = [
                    'name' => $arRow['UF_TRANSLATE'],
                    'code' => $arFields[$el["PROPERTY_CODE_VALUE"]]['code'],
                    'price' => $arFields[$el["PROPERTY_CODE_VALUE"]]['price'],
                    'category' => $arFields['SECTION_ID']
                ];
            }
        }

        $arFields = $this->prepare($arFields, $sections, $translates);
        $result->setSuccess($arFields);
        return $result->getArray();
    }

    private function prepare($data = [], $sections = [], $translates = []) {
        $res = [];
        foreach ($data as $price) {

            if ($translates[$price['code']]) {
                $price['name'] = $translates[$price['code']]['name'];
            }


            $res[$sections[$price['category']]['id']]['name'] = $sections[$price['category']]['name'];
            $res[$sections[$price['category']]['id']]['data'][] = [
                'name' => $price['name'],
                'code' => $price['code'],
                'price' => $price['price'],
            ];

        }
        return $res;
    }
}