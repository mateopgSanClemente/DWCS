<?php 

/*
Necesitamos almacenar la siguiente información en un array multidimensional:

- **John**
    - email: `john@demo.com`
    - website: `www.john.com`
    - age: `22`
    - password: `pass`
- **Anna**
    - email: `anna@demo.com`
    - website: `www.anna.com`
    - age: `24`
    - password: `pass`
- **Peter**
    - email: `peter@mail.com`
    - website: `www.peter.com`
    - age: `42`
    - password: `pass`
- **Max**
    - email: `max@mail.com`
    - website: `www.max.com`
    - age: `33`
    - password: `pass`

Almacena e imprime la información. 
*/

$arrayNombre = [
    "John" => [
        "email" => "john@demo.com",
        "website" => "www.john.com",
        "age" => 22,
        "password" => "pass"],
    "Anna" => [
        "email" => "anna@demo.com",
        "website" => "www.anna.com",
        "age" => 24,
        "password" => "pass"],
    "Peter" => [
        "email" => "peter@mail.com",
        "website" => "www.peter.com",
        "age" => 42,
        "password" => "pass"],
    "Max" => [
        "email" => "max@mail.com",
        "website" => "www.max.com",
        "age" => 33,
        "password" => "pass"
    ]
];
foreach ($arrayNombre as $key => $value){
    print("<br>Nombre: $key");
    foreach ($value as $key2 => $value2) {
        print("<br>$key2: $value2");
    }
}
?>