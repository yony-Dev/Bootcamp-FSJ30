<?php
/* 1. Problema de lista invetida
Escribe un programa que tome un array de números y devuelva 
una nueva lista que contenga los mismos elementos en orden inverso
sin arrar_reverse()
*/
function invertirLista($array) {
    $arraysitoNuevo = [];
    for ($i = count($array) -1; $i >= 0; $i--) {
        $arraysitoNuevo[] = $array[$i];
    }
    return $arraysitoNuevo;
}

/*  2. Problema de Suma de Números Pares:
Crea un script que sume todos los números pares 
en un array de números enteros. */
function sumarParesArray($array) {
    $total = 0;
    foreach ($array as $numero) {
        // si tenemos numeros pares
        if ($numero % 2 === 0) {
            $total += $numero;
        }
    }
    return $total;
}

/* 3. Problema de Frecuencia de Caracteres:
Implementa una función que tome una cadena de texto y devuelva 
un array asociativo que muestre la frecuencia de cada carácter en la cadena.
 */
function contarFrecuenciaCaracteres($stringParam){
    $frecuenciaCaracter = [];

//cortar el string en caracteres -> str_split
    $caracteres = str_split($stringParam);
    // recorrer los caracteres
    foreach ($caracteres as $caracter) {
        //iset -> determina si un valor existe, si eso pasa nos da true
        if (isset($frecuenciaCaracter[$caracter])) {
            $frecuenciaCaracter[$caracter]++;
        } else {
            $frecuenciaCaracter[$caracter] = 1;
        }
    }
    return $frecuenciaCaracter;
}
print_r(contarFrecuenciaCaracteres("Holiwis como andis?"));

/*
 Problema de Bucle Anidado:
Escribe un programa que utilice bucles anidados para imprimir
 un patrón de asteriscos en forma de pirámide.
*/

function imprimirPiramide(){
    $filas = 5;
    
    //primer bucle es para la altura por eso comienza en 1
    //se repite hasta la cantidad de la altura que tenemos
    for ($i = 1; $i <= $filas; $i++) {
        //segundo bucle controla los espacios en blanco antes de dibujar los asteriscos
        for ($espacios = 1; $espacios <= ($filas - $i); $espacios++) {
            echo " ";
        }
        //tercer bucle controla la cantidad de asteriscos por fila
        //formula para saber cuantos asteriscos necesitamos es (2 * $i - 1)
        for ($asteriscos = 1; $asteriscos <= (2 * $i - 1); $asteriscos++) {
            echo "*";
        }
        echo "\n";
    }
}
imprimirPiramide();
?>