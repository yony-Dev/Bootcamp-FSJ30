<?php

function busquedaLineal($lista, $elmentoBuscado){
    for ($i=0; $i < count($lista); $i++) { 
        if ($lista[$i] === $elmentoBuscado) {
            return $i; //retornar la posicion donde este
        }
    }
    return -1; //no encontramos el elemento
}

//Ejemplo de estudinates del FSJ30

$estudiantes = [
    "Alejandro", "Alvin", "Andrea","Alejandra"
];

$posicion = busquedaLineal($estudiantes, "Andrea");

if ($posicion !== -1) {
    echo "Encontre a Andrea en la posicion: ". $posicion. "\n";
    echo "En la lista esta como: ". $estudiantes[$posicion]. "\n";

}else{
    echo "Andrea no esta en la lista de FSJ30";
}
?>