## Bienvenido a IncaLINKS

Los enlaces dinámicos de IncaLINKS permiten crear accesos cortos y recordables fácilmente
para tu website.


### ¿Que resuelve?

Muchas veces se usan servicios de terceros que nos dan un enlace algo complicado de recordar
por ejemplo:
```
"f536cbfa-cd6d-4515-a9f3-9ba4dffeae22", "ChIJgUbEo8cfqokR5lP9_Wh_DaM" o "01F36TGT0GC0Q8W7T18B3Q51P3"
```
Con IncaLinks crea tus propios enlaces que serán más fáciles de recordar como:
```
"viernesDeNavidad"
"formularioCampamento"
"audioUltimoDomingo"
```
### ¿Qué más tiene?

Tiene un manejo básico de usuarios para la administración de los enlaces.

### ¿Cómo lo obtengo?

Para usar IncaLINKS debes bajarlo de github, y luego bajar sus dependencias de paquetes.

```
git clone https://github.com/gerMdz/incalinks.git
cd project
composer install
yarn install 
```


Requerimientos
------------

* PHP 7.2.9 o superior;
* PDO-SQLite PHP extension enabled (o el PDO para tu base de datos);
* y los [usuales requerimientos de una aplicación Symfony][2].

Uso
-----

No es necesario configurar nada para ejecutar la aplicación. Si usted tiene instalado
el binario de [Symfony][4], ejecute el siguiente comando:

```bash
$ symfony serve -d
```

Luego acceda a la aplicación en su navegador con la URL dada (<https://localhost:8000> generalmente).

Si no tiene instalado el binario de Symfony, ejecute `php -S localhost:8000 -t public/`
para utilizar el servidor web PHP incorporado o [configure un servidor web][3] como Nginx o
Apache para ejecutar la aplicación.

Tests
-----

Ejecute este comando para correr los tests:

```bash
$ ./bin/phpunit
```


#### IncaLINKS se base en
- [Symfony][1] framework PHP.
- [Bootstrap](https://getbootstrap.com/) plantillas.
- [FontAwesome](https://fortawesome.github.io/Font-Awesome/) icons.


[1]: https://symfony.com
[2]: https://symfony.com/doc/current/reference/requirements.html
[3]: https://symfony.com/doc/current/cookbook/configuration/web_server_configuration.html
[4]: https://symfony.com/download