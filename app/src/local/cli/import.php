<?php
$_SERVER['DOCUMENT_ROOT'] = realpath(__DIR__ . '/../..');
require_once($_SERVER['DOCUMENT_ROOT'] . "/bitrix/modules/main/include/prolog_before.php");
require $_SERVER['DOCUMENT_ROOT'] . '/local/php_interface/classes/import/ImportPriceList.php';
$importer = new ImportPriceList();
$importer->import();