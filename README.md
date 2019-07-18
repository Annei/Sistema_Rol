##SISTEMA##
### Instalación ###

* `git clone https://github.com/Annei/Sistema_Rol.git nombre_Carperta_nueva`
* `cd nombre_de_tu_Carpeta_nueva`
* `composer install`
* `cp .env.example .env`
* `php artisan key:generate`
*  Agrefgar info de db a *.env*
* `php artisan migrate` migrar las tablas
* `php artisan db:seed` migrar datos
* `php artisan serve` empezar el proyecto
