#!/bin/bash

docker exec -i ${PROJECT_NAME}_php-apache_1 /bin/bash -c "cd local && composer install"
docker exec -i ${PROJECT_NAME}_php-apache_1 /bin/bash -c "chown -R www-data:www-data /var/www"