#!/bin/bash

rm /var/www/html/bitrix/.settings.php
rm /var/www/html/bitrix/php_interface/dbconn.php

cp -r ./configs/.settings.php /var/www/html/bitrix/.settings.php
cp -r -i ./configs/dbconn.php /var/www/html/bitrix/php_interface/dbconn.php