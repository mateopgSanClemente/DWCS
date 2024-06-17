<?php
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

function imprimirProfesores ($array){
    foreach($array as $facultad => $arrayDepartamentos){
        echo "<h4>$facultad</h4>";
        echo "<ul>";
        foreach($arrayDepartamentos as $departamento => $profesores_cursos){
            foreach ($profesores_cursos as $key => $value){
                if($key == "Profesores"){
                    foreach($value as $nombre)
                    echo "<li>$nombre</li>";
                }
            }            
        }
        echo "</ul>";
    }
}
imprimirProfesores($universidad);

function imprimirProfesoresFiltrando($array, $letra){
    foreach($array as $facultad => $arrayDepartamentos){
        echo "<h4>$facultad</h4>";
        echo "<ul>";
        foreach($arrayDepartamentos as $departamento => $profesores_cursos){
            foreach ($profesores_cursos as $key => $value){
                if($key == "Profesores"){
                    foreach($value as $nombre){
                        if($nombre[0]==$letra)
                        echo "<li>$nombre</li>";
                    }
                }
            }            
        }
        echo "</ul>";
    }
}

imprimirProfesoresFiltrando($universidad, "M");