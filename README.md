# OpenMeet

## Installation

### LAMP stack

Coming soon 

### Docker install

Set up the .env file

```
cp .env{.example,}
```

Replace environment variables
```
DB_HOST=db
DB_DATABASE=openmeet_db
DB_USERNAME=openmeet
DB_PASSWORD=password
```

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
