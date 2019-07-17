#Sistema_Rol


Instalación

-git clone  roles

-cd roles
-composer install
-cp .env.example .env
-php artisan key:generate
-Agrega la info de la database en .env
-php artisan migrate para migrar las tablass
-php artisan db:seed para crear los datps
-php artisan serve para empezar la app
