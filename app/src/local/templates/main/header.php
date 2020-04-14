<?
\Bitrix\Main\Loader::includeModule("itpeople.site");
?><!DOCTYPE html>
<html lang="ru" dir="ltr" class="<?=$pageClass?>">
<head>

	<title><?$APPLICATION->ShowTitle()?></title>
	<?
	$APPLICATION->ShowHead();
	?>
</head>

<body>
	<?$APPLICATION->ShowPanel();?>