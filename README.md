<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

## Acerca de este proyecto
 Es un mini blog con caracteristicas de red social, que he estado contruyengo por un tiempo.
Para poder probarlo seguir las instrucciones de aqui abajo.

- [1.- Clonar proyecto ] git clone https://github.com/Omar-Hack/blog39b.git.
- [2.- Copiamos el rchivo de configuración ] cp .env.example .env.
- [3.- Generamos la clave en el archivo de configuración ] php artisan key:generate.
- [3.- Instalamos la xarpeta vendor de laravel ] composer install.
- [4.- Creamos la ruta de las imagenes ] php artisan storage:link.
- [5.- Creamos una base de datos con el nombre, usuario y contraseña que nosotros elijamos y esos datos los agregamos en .env en el archobo de configuración global].
- [6.- Creamos las tablas y datos falsos ] php artisan migrate:refresh --seed.

