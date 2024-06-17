## Acceso al equipo

Usuario: dawmddwcs

Contraseña: DWCSdwcs!

## Antes de empezar

* Debes saber tus credenciales de acceso a `GitHub` y a la web de `fpadistancia`.

* Se debe emplear el PC asignado en el aula del examen. No se puede utilizar ningún otro ordenador ni teléfono.

* Podéis utilizar todos los materiales que queráis.

* Está permitido el uso de internet a excepción de sistemas como ChatGPT o Copilot.

* Se realiza la grabación del examen para una posible revisión.

* Debes trabajar en la máquina virtual que tienes disponible en el equipo y que se llama `DWESDeveloperExamen`.

* Clona el repositorio que utilizas para éste módulo en la máquina virtual. Si no tienes repositorio deberás crearlo.

* Deberás autorizar a Visual Studio Code para utilizar tu cuenta de GitHub.

* Recuerda recrear los contenedores de docker.

* Dentro del directorio `www` de tu repositorio crea un directorio que se llame `FinalExamen`.

* Asegúrate de que el profesor sea colaborador de tu repositorio (xulioxesus@gmail.com).

* Descomprime el contenido del archivo `contenidoFinalExamen.zip` de la tarea del examen en la carpeta `www/FinalExamen/`. Puedes utilizar el comando unzip desde el terminal para hacerlo.

* No borres el fichero `Enunciado.md`.

* Haz commit una vez que esté preparado todo.

* También puedes hacer push a tu repositorio remoto.

## Ejercicio 1 - Vocales (2 puntos)

Edita el fichero `e1.php` que sólo va a contener código PHP.

Dado un string cualquiera, por ejemplo:

    $stringCualquiera = "Esto es un string cualquiera"

Crea una función `contarVocales` a la que se le pasa un string como parámetro y **devuelve** el número de vocales sin tildes que tiene el string. Las vocales en mayúsculas también deben ser consideradas. Para el caso anterior devolvería:

    11

Crea una función `obtenerVocales` que **devuelva** un array con las vocales sin tildes. Para el caso anterior devolvería:

    ['E','o','e','u','i','u','a','u','i','e','a']

Las funciones no deben imprimir. Deben devolver los tipos de datos solicitados.

Prueba las funciones en un script que se llame `e1_test.php` donde se vea de forma clara que las funciones están bien hechas.

**Haz commit del ejercicio. También puedes hacer push a tu repositorio.**

## Ejercicio 2 - Array multidimensional (2 puntos)

Edita el fichero `e2.php` que sólo va a contener código PHP.

Dado un array multidimensional con la siguiente estructura:

```php
$universidad = array(
    "Facultad de Ciencias" => array(
        "Departamento de Física" => array(
            "Profesores" => array(
                "Juan Pérez",
                "Ana García"
            ),
            "Cursos" => array(
                "Mecánica",
                "Electromagnetismo"
            )
        ),
        "Departamento de Matemáticas" => array(
            "Profesores" => array(
                "Carlos Sánchez",
                "María López"
            ),
            "Cursos" => array(
                "Álgebra",
                "Cálculo"
            )
        )
    ),
    "Facultad de Letras" => array(
        "Departamento de Historia" => array(
            "Profesores" => array(
                "José Ruiz",
                "Elena Fernández"
            ),
            "Cursos" => array(
                "Historia Antigua",
                "Historia Moderna"
            )
        ),
        "Departamento de Literatura" => array(
            "Profesores" => array(
                "Miguel Hernández",
                "Laura Martínez"
            ),
            "Cursos" => array(
                "Literatura Española",
                "Literatura Universal"
            )
        )
    )
);
```

Diseña las funciones siguientes teniendo en cuenta que el número de facultades, departamentos, profesores y cursos puede variar.

Crea una función `imprimirProfesores` que recibe como parámetro un array como el anterior e **imprime** en forma de lista no ordenada (en html) todos los nombres de los profesores de cada facultad. Antes de cada minilista de profesores se debe imprimir un encabezado de nivel 4 con el nombre de la facultad.

Crea una función `imprimirProfesoresFiltrando` que recibe como parámetro un array como el anterior e **imprime** en forma de lista no ordenada (en html) todos los nombres de los profesores de cada facultad que comienzan por la letra que se pasa como segundo parámetro. Antes de cada minilista de profesores se debe imprimir un encabezado de nivel 4 con el nombre de la facultad.

Prueba la función en la página `e2_test.php`. El código HTML generado debe aparecer en el `div` de la clase `container`.

**Haz commit del ejercicio. También puedes hacer push a tu repositorio.**

## Ejercicio 3 - Ficheros (2 puntos)

Modifica la aplicación que se encuentra en la carpeta `e3`.

Cuando se envía el formulario se debe guardar la nota en el fichero `notas/notas.txt`. En cada línea de dicho fichero se encuentra el título de una nota y su contenido, separados por un `;`.

Modifica el index para que se muestren las notas contenidas en el fichero `notas/notas.txt` utilizando el formato que se indica en `index.php`.

**Haz commit del ejercicio. También puedes hacer push a tu repositorio.**

## Ejercicio 4 - Interfaces y herencia (2 puntos)

En el directorio `e4`.

Define una interfaz `Imprimible` con las operaciones `imprimirEnTabla` y `imprimirEnLista`.

Define una clase `Articulo` que implemente la interfaz `Imprimible`. Dicha clase debe cumplir:

- tres atributos protegidos
    - titulo
    - contenido
    - autor
- el constructor apropiado para dar valores a los atributos.
- los getters para los atributos
- los setters para los atributos
- la implementación de imprimirEnTabla **devuelve** un string con los campos del artículo en formato html utilizando la etiqueta `<table>`.
- la implementación de imprimirEnLista **devuelve** un string con los campos del artículo en formato html utilizando la etiqueta `<ul>`.

Define una clase `ArticuloRevista` que herede de `Articulo` y añada el string "Revista - " delante del título.

Define una clase `ArticuloPeriodico` que herede de `Articulo` y añada el string "Periodico - " delante del título.

Prueba las clases `ArticuloRevista` y `ArticuloPeriodico` en un fichero llamado `Test.php`.

**Haz commit del ejercicio. También puedes hacer push a tu repositorio.**

## Ejercicio 5 - Symfony (2 puntos)

Modifica la aplicación que se encuentra en la carpeta `e5`.

* Lanza y el proyecto de symfony e instala los bundles necesarios para trabajar con vistas.

* Crea una página con la ruta `/posts` que muestre los datos que se encuentran en [https://raw.githubusercontent.com/sabelassm/json-example/master/posts.json](https://raw.githubusercontent.com/sabelassm/json-example/master/posts.json). Deben mostrarse en formato HTML.

* Crea una página con la ruta `/postscache` que muestre los datos que se encuentran en [https://raw.githubusercontent.com/sabelassm/json-example/master/posts.json](https://raw.githubusercontent.com/sabelassm/json-example/master/posts.json). Deben mostrarse en formato HTML. Se tiene que utilizar el sistema de caché de symfony con un tiempo de caducidad de 2 segundos.

**Haz commit del ejercicio. También puedes hacer push a tu repositorio.**

## Finalizar y entregar el examen

* Realiza un push a tu repositorio.
* Entrega tu repositorio comprimido en la tarea disponible en el aula virtual.
* El nombre del fichero `FinalExamen.zip`.
* Entrega la URL de tu repositorio en la tarea disponible en el aula virtual.