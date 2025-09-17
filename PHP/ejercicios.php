<?php
// =======================================
// Problema 1: Serie Fibonacci
// Función que genera los primeros n términos de la serie Fibonacci
function generarFibonacci($n) {
    $fibonacci = []; // Arreglo para almacenar los términos de la serie
    
    // Caso base: si n es 0 o menor, no hay términos que mostrar
    if ($n <= 0) {
        return $fibonacci;
    }
    
    // Primer término
    $fibonacci[] = 0;

    // Si n es 1, solo devolvemos el primer término
    if ($n == 1) {
        return $fibonacci;
    }

    // Segundo término
    $fibonacci[] = 1;

    // Generamos los siguientes términos desde el tercero hasta n
    for ($i = 2; $i < $n; $i++) {
        $fibonacci[] = $fibonacci[$i - 1] + $fibonacci[$i - 2];
    }

    return $fibonacci;
}
// Fibonacci de 10 términos
echo "Serie Fibonacci (10 términos): \n";
print_r(generarFibonacci(10));
echo "\n";

// =======================================
// Problema 2: Números primos
// Función que determina si un número es primo
function esPrimo($num) {
    // Los números menores o iguales a 1 no son primos
    if ($num <= 1) {
        return false;
    }

    // Recorremos desde 2 hasta la raíz cuadrada del número
    // Si encontramos un divisor exacto, no es primo
    for ($i = 2; $i <= sqrt($num); $i++) {
        if ($num % $i == 0) {
            return false;
        }
    }
    return true; 
}
// Verificación de números primos
echo "¿7 es primo?: " . (esPrimo(7) ? "Sí" : "No") . "\n";
echo "¿10 es primo?: " . (esPrimo(10) ? "Sí" : "No") . "\n";
echo "¿13 es primo?: " . (esPrimo(13) ? "Sí" : "No") . "\n";
echo "\n";

// =======================================
// Problema 3: Palíndromos
// Función que determina si una cadena es palíndromo
function esPalindromo($texto) {
    // Convertimos a minúsculas y eliminamos espacios
    $texto = strtolower(str_replace(' ', '', $texto));

    // Invertimos la cadena
    $invertido = strrev($texto);

    // Si la cadena original y la invertida son iguales => palíndromo
    return $texto === $invertido;
}

// Verificación de palíndromos
echo "¿'Reconocer' es palíndromo?: " . (esPalindromo("Reconocer") ? "Sí" : "No") . "\n";
echo "¿'Hola mundo' es palíndromo?: " . (esPalindromo("Hola mundo") ? "Sí" : "No") . "\n";
?>
