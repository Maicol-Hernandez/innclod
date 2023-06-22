<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# 1.¿Cuáles son los requisitos del servidor para activar el script?
## Respuesta: Para instalar el Script los requisitos mínimos del servidor son:

- [Php version 8.2+]
- [MySQL 10.4+-MariaDB]
- [mod_rewrite Apache]
- [BCMath PHP Extension]
- [Ctype PHP Extension].
- [Mbstring PHP Extension]
- [PDO PHP Extension]
- [Tokenizer PHP Extension]
- [Session PHP Extension]

En la mayoría de los servidores, estas extensiones están activadas por defecto, pero debe consultar a su proveedor de alojamiento.

# 2.¿Cómo instalar el script?
## Respuesta: Para instalar el script siga los siguientes pasos.

- Extraiga el archivo .zip descargado en su PC o el código directamente desde GitHub.
- Cargue el archivo .zip en el directorio public_html de su servidor o en cualquier otro directorio en el que desee ejecutar.
- Extraiga el archivo zip en ese directorio.
- Cree una nueva base de datos a partir de la base de datos MySQL de su servidor.
- Cree un usuario DB para la base de datos y vincule esa base de datos al usuario DB.
- Configure las variables de entorno a partir del archivo .env-example.
- Escribe por la consola el comando `php artisan migrate fresh --seed`.
- Escribe el comando en una nueva consola `npm install`.
- Escribe el comando en una nueva consola `npm run dev`.
- Pulse en la URL amigable generada por el comando `php artisan serve`.
# 3.¿Cómo iniciar sesión al sistema?
## Respuesta: Para iniciar sesión en el sitema siga los siguientes pasos.

- Presione en el botón Log in.
- Navegar a la página de Log in
- Ingresar el campo Email el siguiente correo `test@example.com`.
- Ingresar el campo Password la siguiente contraseña `test12345`.
- Hacer clic en el botón de "Log in" para acceder al sistema.
# 3.¿Cómo registrarse en el sistema?
## Respuesta: Para registrarse en el sitema siga los siguientes pasos.

- Presione en el botón Register.
- Navegar a la página de Registe`
- Llenar los campos Name, Email, Password y Confirm Parssword.
- Hacer clic en el botón de "Register" para acceder al sistema.
## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[OP.GG](https://op.gg)**
- **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**
- **[Lendio](https://lendio.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
