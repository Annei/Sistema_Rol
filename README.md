### Instalación ###

* `git clone https://github.com/Annei/Sistema_Rol.git roles`
* `cd roles`
* `composer install`
* `cp .env.example .env`
* `php artisan key:generate`
*  Agrega la info de la db en*.env*
* `php artisan migrate` migrar las tablas
* `php artisan db:seed` migrar datos
* `php artisan serve` 
