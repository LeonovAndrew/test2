<?
/**
 * Genesis Showroom
 *
 * @author Anton Desin anton.desin@gmail.com
 * @copyright (c) Anton Desin
 * @link https://desin.name
 */

use \Bitrix\Main\Page;

Page\Asset::getInstance()->addString('<meta charset="utf-8">', false, Page\AssetLocation::BEFORE_CSS);
Page\Asset::getInstance()->addString('<meta name="viewport" content="width=1280">', false, Page\AssetLocation::BEFORE_CSS);
Page\Asset::getInstance()->addString('<link href="/static/css/main.css" rel="preload" type="text/css" />', false, Page\AssetLocation::BEFORE_CSS);