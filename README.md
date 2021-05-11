### Docker install

Simply put in the .env DB_HOST to db.

Build the Docker image

```
docker-compose build app
```

Run the OpenMeet Docker stack

```
docker-compose up -d
```

Configure OpenMeet

```
docker-compose exec openmeet-app composer install
docker-compose exec openmeet-app php artisan key:generate
docker-compose exec openmeet-app php artisan migrate:fresh
```

Run `http://localhost:8000`
