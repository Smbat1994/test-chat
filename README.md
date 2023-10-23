# Install

Команды для выполнения

```
docker-compose up -d
```

Создаются контейнеры. Нас интересует в основном test-chat_fpm_1

Далее Запустим
```
docker exec -it test-chat_fpm_1 bash
```

```
php ./yii migrate --migrationPath=@yii/rbac/migrations
```

```
php ./yii migrate
```

Далее Переходим на сайт [http://127.0.0.1:8098](http://127.0.0.1:8098)
