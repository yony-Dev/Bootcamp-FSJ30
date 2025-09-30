<?php
// Algoritmo Bubble Sort en PHP (orden descendente)

function bubbleSortDesc(&$arr) {
    $n = count($arr);
    for ($i = 0; $i < $n - 1; $i++) {
        for ($j = 0; $j < $n - $i - 1; $j++) {
            // Si el elemento actual es menor que el siguiente, los intercambiamos
            if ($arr[$j] < $arr[$j + 1]) {
                $temp = $arr[$j];
                $arr[$j] = $arr[$j + 1];
                $arr[$j + 1] = $temp;
            }
        }
    }
}

// Lista de prueba
$numeros = [34, -2, 45, 29, 8, -2, 45];

echo "Lista original:\n";
print_r($numeros);

bubbleSortDesc($numeros);

echo "Lista ordenada (descendente con Bubble Sort):\n";
print_r($numeros);
?>
