## Web Participation App

This project is from the IFGI in Münster and aims at creating a participation web plattform for citizens in order to collaborate for the Stadtlabor for the Corrrensstraße.

## Run project

In order to make the project run on your machine, some steps need to be taken:
1. Install all required packages: ````npm install```` and ```composer install```
2. Make sure the database is set up and also clear it with ```php artisan migrate:fresh```
3. You may seed some dummy data in order to investigate how the platform may look with real users and data. For that run  ```php artisan db:seed```
3. Finally, run the project: ````php artisan serve````


## Update the server configuration
````cd /var/www/html````
````git pull````
````php artisan migrate:fresh --seed````
