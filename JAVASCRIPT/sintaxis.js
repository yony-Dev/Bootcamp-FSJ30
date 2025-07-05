//Comentarios -> deshabilitar lineas 
/* 
multilines
 */
//Impresiones en consola
console.log(`Holiwis`);

//variables y constantes
let variable = "Yony";
var varieblecita = "BS";

const numero = 3.1416;

console.log(`Hola ${variable}`);

//Cambiar los tipos de valores o variables
//Parse

let cinco = parseInt("5");
console.log(cinco + 5);

//Operadores matematicos

let suma = 5+5;
let resta = 5-5;
let multiplicacion = 5*5;
let division = 5/5;
let residuo = 10%2;

//Operadores logicos
// AND & - OR || - NOT !

//Operadores de comparacion
//Igualdad, desigualdad
let igualdad = "5" == 5;
console.log(igualdad);

let igualdadStricta = "5" === 5;
console.log(igualdadStricta);

let desigualdad ="5"!==5
console.log(desigualdad);

//Ternario 
condicion ? "caso true" : "caso false";

//Estructuras repetitivas 
contador=0;
while (contador < 5 && contador > 0) {
    console.log(contador);
    contador++
}

contador=0;
do {
    console.log(contador);
    contador++;
} while (contador < 5 && contador > 0);



for (let i = 0; i < 5; i++) {
   console.log(i);
}

//Fuciones

function saludar (){
    console.log("Holiwis");

}

//Funciones anonimas

const funcioncita = function () {console.log("Soy anonima");}

funcioncita()

//Far arrow funcitons o funciones flechas

const funcionFlecha = () => {console.log("Soy anonima");}
funcionFlecha()