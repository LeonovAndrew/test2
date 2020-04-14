#  CRM Hyundai

Backend сайта CRM Hyundai

#### Общий формат запросов для API
 * **[GET] /v1/entity-name** - Спиcок элементов
 * **[GET] /v1/entity-name/1** - Получение данных элемента
 * **[POST] /v1/entity-name** - Создание элемента
 * **[PUT] /v1/entity-name/1** - Редактирование элемента
 * **[DELETE] /v1/entity-name/1** - Удаление элемента

#### Стандартный ответ сервера
```json5
{
    "success": true,  //  Статус, значения true|false
    "message": "",    //  В случае ошибки в этом поле будет содержаться сообщение
    "data": {},       //  Объект с данными, прилагаемый к ответу
    "code": 200       //  Код статуса ответа сервера
}
```

#### Резвертывание проекта
* Скопировать файл .env.sample в .env, заполнить настройки в соответствии с окружением
* В параметры BITRIX_DIR и UPLOAD_DIR нужно прописать относительные пути к папка bitrix и upload из доп. файлов проекта. Например: ../mount/bitrix
* Выполнить:
```cmd
# Сборка контейнера
docker-compose -f docker-compose.yml -f docker-compose-local.yml -f docker-compose-mysql.yml -f docker-compose-pma.yml build
#  Для запуска в DEV-режиме
docker-compose -f docker-compose.yml -f docker-compose-local.yml -f docker-compose-mysql.yml -f docker-compose-pma.yml up -d

#  Создание дампа БД
docker exec -i hyundai-crm-backend_mysql_1 /bin/bash -c "mysqldump -uroot --password='zxeXHZpy9ofW' hyundai_crm" > ./app/dev-starter-db.sql
#  После создание дампа, нужно добавить в него создание базы
CREATE DATABASE IF NOT EXISTS `hyundai_crm` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `hyundai_crm`;
```

#### Описание файлов конфигурации Docker Compose:
1. **docker-compose.yml** - базовый файл, содержит конфиг самого приложения
2. **docker-compose-local.yml** - локальная конфигурация с монтированием директорий. Соответствующие параметры должны быть заданы в .env
3. **docker-compose-mysql.yml** - подключить, если нужно создать контейнер MySQL
4. **docker-compose-pma.yml** - подключить если требуется PHPMyAdmin. Сервис будет доступен по адресу http://ВАШ_ХОСТ:$PMA_PORT. PMA_PORT - параметр должен быть задан в .env

#### Сборка
```cmd
# После запуска
export PROJECT_NAME=hyundai-crm-backend \
    && export MYSQL_ROOT_PASSWORD='zxeXHZpy9ofW' \
    && chmod +x ./build.sh && ./build.sh
    && chmod +x ./init_mysql.sh && ./init_mysql.sh
```

#### Стандартные доступы:
* admin gk4xdfbQKo8i
* coord WYcqjS7ptngN
* super MlVZg1yCURn9
* host PNj23Ydis8ut
