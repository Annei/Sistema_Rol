##SISTEMA##
### Instalación ###

* `git clone https://github.com/Annei/Sistema_Rol.git nombre_Carperta_nueva`
* `cd nombre_de_tu_Carpeta_nueva`
* `composer install`
* `cp .env.example .env`
* `php artisan key:generate`
*  Agregar info de db a *.env*
* `composer require org.majkel/dbase` Instalar la libreria para los dbfs
* `php artisan migrate` migrar las tablas
* `php artisan db:seed` migrar datos
* `php artisan serve` empezar el proyecto
