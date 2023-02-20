# IT Sec
_IT Sec is a simple web application for managing security detail asssets._

Management of clients, security personel and assets.

Project running on Docker, PHP's Laravel, MySQL and Apache.

### Configuring the project
Once you have Docker set up and running, run the following commands:

```
docker-compose build
docker-compose up -d
docker-compose exec php chmod -R 777 storage
docker-compose exec php composer install
cp .env.example .env
```

Set up the .env file with the database connection details

```
docker-compose exec php php artisan storage:link
docker-compose exec php php artisan key:generate
docker-compose exec php php artisan migrate
```

The project should be good to go.
