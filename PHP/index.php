<?php
//Diferencias vs Javascript
// 1. PHP es un lenguaje compilado (se interpreta por apache)
// 2. PHP es un lenguaje de tipado debil pero con tipado obligatorio
// 3. PHP no es case sensitive (no distingue entre mayusculas y minusculas) en variables y funciones
// 4. PHP vamos a utilizar una POO con todos los pilares
// Delimitadores

/* Comentario
multilinea */

// Salto de linea \n
// La concatenacion va a ser con el punto .
echo "Hola Mundo"."\n";
print "Hola Mundo con print\n";
echo "Hola"." Mundo"." con "." concatenacion\n";

// Variables
//let nombre = "Yony";
$nombre = "Yony";
//constante
define("PI", 3.1416);

//Templete String
$templateString = "Hola mi nombre es ${nombre}";
echo $templateString . "\n";

// Operadores matematicos
$suma = 2 + 3;
$resta = 5 - 2;
$multiplicacion = 3 * 4;
$division = 10 / 2;
$modulo = 10 % 3; // Resto de la division
$exponente = 2 ** 3; // Potencia 2^3 = 8

// Operadores de asignacion
$igual = (2 == 2); 
$igualdadEstricta = (2 === "2");
$diferente = (2 != 3);
$diferenteEstricta = (2 !== "2");
$mayor = (2 > 1);
$menor = (2 < 3);
$mayor_igual = (2 >= 2);
$menor_igual = (2 <= 3);

//Operadores logicos AND (&&), OR (||), NOT (!)
$y = (2>3 && 3<=2);
$o = (3>5 || 2<5);
$no = !true;

//=====================================================
//Funciones
//Funcion expresada
function saludar($nombre) {
    return "Hola, {$nombre}";
}

echo saludar("Jose")."\n";

//Funcion anonima
$despedida = function($nombre) {
    return "Adios, {$nombre}";
};
echo $despedida("Jose")."\n";
//Funcion flecha (php 7.4+)
$gritar = fn($nombre) => strtoupper("Holaaaa, {$nombre}");
echo $gritar("Yony")."\n";

//=====================================================
//Estructuras condicionales
//IF, ELSEIF, ELSE
$edad = 18;
if ($edad < 18) {
    echo "Eres menor de edad\n";
} elseif ($edad == 18) {
    echo "Tienes 18 años\n";
} else {
    echo "Eres mayor de edad\n";
}
//switch case
$dia = 3;
switch ($dia) {
    case 1:
        echo "Lunes\n";
        break;
    case 2:
        echo "Martes\n";
        break;
    case 3:
        echo "Miercoles\n";
        break;
    default:
        echo "Es un otro dia que no hay clases\n";
        break;
}

//ternario
$mensaje = ($edad >= 18) ? "Eres mayor de edad\n" : "Eres menor de edad\n";

//=====================================================
//estructuras repetitivas
//while
$contador = 0;
while ($contador < 5) {
    echo "El valor del contador es: {$contador}\n";
    $contador++;
}
//do while
$contador2 = 0;
do {
    echo "El valor del contador2 es: {$contador2}\n";
    $contador2++;
} while ($contador2 < 5);
//for
for ($i = 0; $i < 5; $i++) {
    echo "El valor de i es: {$i}\n";
}
?>