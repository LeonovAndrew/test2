<?php
$_SERVER['DOCUMENT_ROOT'] = __DIR__ . '/../..';
require_once($_SERVER['DOCUMENT_ROOT'] . "/bitrix/modules/main/include/prolog_before.php");
$importer = new ImportPriceList();
$importer->import();