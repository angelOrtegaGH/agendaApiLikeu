# agendaApiLikeu

Proyecto api para creacion y modificacion de agendas, creacion de clientes, creacion de usuarios, con autenticacion.

##Instalacion

1- Se debe instalar composer desde la pagina oficial de [composer](https://getcomposer.org/download/).

2- Una vez instalado composer nos ubicaremos en la raiz del proyecto y en una ventana de comandos ejecutaremos.
~~~bash 
composer instal
~~~
## Configuacion de la base de datos
1- Correr el script de la base de datos el cual contiene algunos datos de prueba.

2- En la raiz del proyecto hay un archivo llamado ".env.example" al cual le haremos una copia y renombraremos como ".env"

3- En un editor de codigo abrimos el archivo que acabamos de copiar ".env" y procedemos a configurar los parametros.

4- Dentro del archivo reemplazaremos el nombre de la base de datos, el usuario y la contraseña como veremos a continuacion.
~~~php
    DB_DATABASE=api_likeu
    DB_USERNAME=projectLikeU
    DB_PASSWORD=1234
~~~
## Creacion de nuevo API Key
Para el funcionamiendo de nuestro proyecto debemos crear un nuevo API key,en la raiz de nuestro proyecto en una ventana de comandos ejecutaremos 
~~~ bash
php artisan key:generate
~~~
## Validacion token
Para comprobar todo ha ido bien, generaremos un token manualmente por consola. En la raiz de nuestro proyecto en una ventana de comandos ejecutaremos el comando:
~~~ bash 
php artisan jwt:secret
~~~
Nos devolverá la generación de un token similar a:
~~~ bash 
jwt-auth secret [PANuhCclcTtAftL2XlTgyCa6AQaJW79CGqlqq9wj0o4dLcxvrJ8mowI9sH42nEeM] set successfully.
~~~
##Posibles errores
En caso de que no se reconozca la variable de entorno php se debe agregar manualmente la variable de entorno php en miEquipo > propiedades > configuracion avanzada del sistema > variables de entorno > hacemos doble click sobre [PATH] > nuevo > y se coloca la ruta absoluda donde tengamos alojado el executable de php.
