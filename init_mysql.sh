#!/bin/bash

docker exec -i ${PROJECT_NAME}_mysql_1 /bin/bash -c "mysql -uroot --password='$MYSQL_ROOT_PASSWORD'" < app/dev-starter-db.sql
#docker exec --user www-data ${PROJECT_NAME}_php-apache_1 /bin/bash -c "php bitrix/tools/migrate apply -f"