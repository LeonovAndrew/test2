<?php
$_SERVER['DOCUMENT_ROOT'] = realpath(__DIR__ . '/../..');
require_once($_SERVER['DOCUMENT_ROOT'] . "/bitrix/modules/main/include/prolog_before.php");

$uploadedFile = $_SERVER['DOCUMENT_ROOT'] . '/import.csv';
$filePath = $uploadedFile;
$handle = fopen($filePath, "r");
\Bitrix\Main\Loader::includeModule('iblock');
$iblock = \CIBlock::GetList(Array(), Array("CODE"=>'pricelist'), false)->Fetch();
$elements = \CIBlockElement::GetList
(
    array(),
    array('IBLOCK_ID'=>$iblock['ID'],)
);

$sections = \CIBlockSection::GetList
(
    array(),
    array('IBLOCK_ID'=>$iblock['ID'],)
);

while($element = $sections->Fetch()) {
    \CIBlockSection::Delete($element['ID']);
}

while($element = $elements->Fetch()) {
    \CIBlockElement::Delete($element['ID']);
}


$codes = [];
$ids = [];
while (($arRes = fgetcsv($handle, 0, ';')) !== false) {
    if (!in_array($arRes[0], $codes)) {
        $section = new \CIBlockSection();
        $sectionID = $section->Add(['NAME' => $arRes[0], "IBLOCK_ID" => $iblock['ID']]);
        $codes[] = $arRes[0];
        $ids[$arRes[0]] = $sectionID;
    } else {
        $sectionID = $ids[$arRes[0]];
    }

    if ($sectionID) {
        $el = new \CIBlockElement;
        $el->Add([
            'NAME' => trim($arRes[2]),
            'IBLOCK_SECTION_ID' => $sectionID,
            'IBLOCK_ID' => $iblock['ID'],
            'PROPERTY_VALUES' => [
                'CODE' => $arRes[1],
                'PRICE' => $arRes[4]
            ]
        ]);
    }
}
