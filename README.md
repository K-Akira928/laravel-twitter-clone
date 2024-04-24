## 起動手順

```bash
mkdir ./docker/nginx/logs
```

```bash
mkdir ./docker/mysql
```

```bash
composer install
```

```bash
npm install
```

```bash
chmod -R guo+w storage
```

```bash
php artisan storage:link
```
