<?
require_once($_SERVER['DOCUMENT_ROOT']. "/bitrix/modules/main/include/prolog_before.php");
\Bitrix\Main\Loader::includeModule('itpeople.site');

defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');

require __DIR__ . '/local/vendor/autoload.php';
require __DIR__ . '/local/vendor/yiisoft/yii2/Yii.php';

$config = require __DIR__ . '/local/yii-app/config/main.php';

//echo "<pre>".var_export($config, true)."</pre>";

(new yii\web\Application($config))->run();
