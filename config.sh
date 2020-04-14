#!/bin/bash

docker exec -i ${PROJECT_NAME}_php-apache_1 /bin/bash -c "rm /var/www/html/bitrix/.settings.php"
docker exec -i ${PROJECT_NAME}_php-apache_1 /bin/bash -c "rm /var/www/html/bitrix/php_interface/dbconn.php"
docker exec -i ${PROJECT_NAME}_php-apache_1 /bin/bash -c "echo \"<?php
return array (
  'utf_mode' =>
  array (
    'value' => true,
    'readonly' => true,
  ),
  'cache_flags' =>
  array (
    'value' =>
    array (
      'config_options' => 3600.0,
      'site_domain' => 3600.0,
    ),
    'readonly' => false,
  ),
  'cookies' =>
  array (
    'value' =>
    array (
      'secure' => false,
      'http_only' => true,
    ),
    'readonly' => false,
  ),
  'exception_handling' =>
  array (
    'value' =>
    array (
      'debug' => true,
      'handled_errors_types' => 4437,
      'exception_errors_types' => 4437,
      'ignore_silence' => false,
      'assertion_throws_exception' => true,
      'assertion_error_type' => 256,
      'log' => NULL,
    ),
    'readonly' => false,
  ),
  'connections' =>
  array (
    'value' =>
    array (
      'default' =>
      array (
        'className' => '\\\\\Bitrix\\\\\Main\\\\\DB\\\\\MysqliConnection',
        'host' => 'mysql',
        'database' => 'medserv',
        'login' => 'root',
        'password' => 'secret',
        'options' => 2.0,
      ),
    ),
    'readonly' => true,
  ),
  'crypto' =>
  array (
    'value' =>
    array (
      'crypto_key' => '5f3d26049aaccec50fac2085ceec78c0',
    ),
    'readonly' => true,
  ),
);
\" >> /var/www/html/bitrix/.settings.php;"
docker exec -i ${PROJECT_NAME}_php-apache_1 /bin/bash -c "cat /var/www/html/bitrix/.settings.php"
docker exec -i ${PROJECT_NAME}_php-apache_1 /bin/bash -c "echo \"
<?php
define(\"BX_USE_MYSQLI\", true);
define(\"DBPersistent\", false);
$DBType = \"mysql\";
$DBHost = \"mysql\";
$DBLogin = \"root\";
$DBPassword = \"secret\";
$DBName = \"medserv\";
$DBDebug = false;
$DBDebugToFile = false;

define(\"DELAY_DB_CONNECT\", true);
define(\"CACHED_b_file\", 3600);
define(\"CACHED_b_file_bucket_size\", 10);
define(\"CACHED_b_lang\", 3600);
define(\"CACHED_b_option\", 3600);
define(\"CACHED_b_lang_domain\", 3600);
define(\"CACHED_b_site_template\", 3600);
define(\"CACHED_b_event\", 3600);
define(\"CACHED_b_agent\", 3660);
define(\"CACHED_menu\", 3600);

define(\"BX_UTF\", true);
define(\"BX_FILE_PERMISSIONS\", 0644);
define(\"BX_DIR_PERMISSIONS\", 0755);
@umask(~(BX_FILE_PERMISSIONS|BX_DIR_PERMISSIONS)&0777);
define(\"BX_DISABLE_INDEX_PAGE\", true);
?>\" >> /var/www/html/bitrix/php_interface/dbconn.php;"
docker exec -i ${PROJECT_NAME}_php-apache_1 /bin/bash -c "cat /var/www/html/bitrix/php_interface/dbconn.php"