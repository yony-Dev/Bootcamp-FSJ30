<?php
// Algoritmo Merge Sort para ordenar palabras alfabéticamente en PHP

function mergeSort($arr) {
    if (count($arr) <= 1) {
        return $arr; // caso base: un solo elemento ya está ordenado
    }

    // Dividimos el arreglo en dos mitades
    $middle = floor(count($arr) / 2);
    $left = array_slice($arr, 0, $middle);
    $right = array_slice($arr, $middle);

    // Ordenamos cada mitad recursivamente
    $left = mergeSort($left);
    $right = mergeSort($right);

    // Unimos las dos mitades ordenadas
    return merge($left, $right);
}

function merge($left, $right) {
    $result = [];
    $i = $j = 0;

    // Comparar elementos de cada mitad
    while ($i < count($left) && $j < count($right)) {
        // strcasecmp ignora mayúsculas/minúsculas
        if (strcasecmp($left[$i], $right[$j]) <= 0) {
            $result[] = $left[$i];
            $i++;
        } else {
            $result[] = $right[$j];
            $j++;
        }
    }

    // Agregar los elementos restantes
    while ($i < count($left)) {
        $result[] = $left[$i];
        $i++;
    }
    while ($j < count($right)) {
        $result[] = $right[$j];
        $j++;
    }

    return $result;
}

$palabras = ["perro", "gato", "Laptop", "Mouse", "Luna", "sol"];

echo "Lista original:\n";
print_r($palabras);

$ordenadas = mergeSort($palabras);

echo "Lista ordenada (alfabéticamente con Merge Sort):\n";
print_r($ordenadas);
?>
