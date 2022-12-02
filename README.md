# IT Sec
IT Sec a simple web application for managing security detail asssets

Project running on PHP's Laravel, MySQL and Apache
### Configuring the project:  
- Have Docker installed   
- Run ```docker-compose build```  
- Run ```docker-compose up -d```  
- Run ```docker-compose exec php chmod -R 777 storage```
- Run ```docker-compose exec php composer install```  
- Copy ```.env.example to .env locally```  
- Configure ```the .env file with docker container data```
- Run ```docker-compose exec php php artisan storage:link ```
- Run ```docker-compose exec php php artisan key:generate```
- Run ```docker-compose exec php php artisan migrate```
