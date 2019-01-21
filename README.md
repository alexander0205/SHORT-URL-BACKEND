
Alexander Ferreras

## Short URL Backend in Laravel

this is a web api application with the objective of you can take any url and cut for other more easy.
Example:
 http://google.com/godld/sssds/sds to http://myurl/sd30sd22
is like a Bit.ly and TinyUR

## Config Data Base

Create a new BD in yourdb MYSL and put the key of db in the root of the project the file .env:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=homestead
DB_USERNAME=homestead
DB_PASSWORD=secret
```
## Install
1- Install [Composer](https://getcomposer.org/)

2- In the root of the project run:

```
composer install
php artisan migrate
```
## URL to use
using method POST
```
    1- http://urlshort/api/generate 
        Params:{url:travesldr.com}
            RETURN: URL SHORT
    2- http://urlshort/api/topMostVisited
        RETURN: LIST TOP 100 MOST VISITED 
```

 ## Images 
 ![alt text](https://raw.githubusercontent.com/alexander0205/SHORT-URL-BACKEND/master/Capture2.PNG)
  ![alt text](https://raw.githubusercontent.com/alexander0205/SHORT-URL-BACKEND/master/Capture.PNG)
 
