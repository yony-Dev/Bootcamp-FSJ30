<?php
// Algoritmo Insertion Sort en PHP (alfabético)

function insertionSort(&$arr) {
    $n = count($arr);
    for ($i = 1; $i < $n; $i++) {
        $key = $arr[$i];
        $j = $i - 1;

        // Mover elementos mayores al key una posición adelante
        while ($j >= 0 && strcasecmp($arr[$j], $key) > 0) {
            $arr[$j + 1] = $arr[$j];
            $j--;
        }
        $arr[$j + 1] = $key;
    }
}

// Lista de prueba
$nombres = ["Yony", "Alexander", "Jose", "Jairo", "Messi"];

echo "Lista original:\n";
print_r($nombres);

insertionSort($nombres);

echo "Lista ordenada (alfabéticamente con Insertion Sort):\n";
print_r($nombres);
?>
