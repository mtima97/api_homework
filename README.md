# JSON API

API для каталога товаров. Пример файла окружения - .env.example
Перед запуском настроить соединение с БД, apache/nginx и mysql сервера!

## Запуск АПИ

1. Установить все пакеты

```bash
composer install
```

2. Запуск миграций

```bash
php artisan db:migrate
```

3. Заполнение БД

```bash
php artisan db:seed
```

## Схема обращения к АПИ

[Contribution guidelines for this project](./api_routes.jpg)