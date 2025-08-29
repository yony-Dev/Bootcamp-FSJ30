//Diferencias entre js y ts 
/*  JS
    -Flexible
    -Facil de aprender
    -Forma de programar sea atraves de funciones
    -WEB -> Navegador (interpretado)
*/
/*  TS
    -Tipado duro -> Ya no es tan flexible
    -POO -> Forma de programar -> Los pilares de POO estan completos
    -Un poco mas dificil de aprender
    -Compilado (TSC) -> Traducir el codigo de TS a JS
*/
//Declaracion de variables 
var numerito = 1; //JS
var numero = 1; //TS
var nombre = "Yony";
var activo = true;
var vacio = null;
//Tipos de datos que no se deben usar
var random = "Puedo ser cualquier cosa";
var indefinidos = undefined;
console.log(numerito);
console.log(numero);
function saludar(nombre) {
    return "Holiwis, ".concat(nombre);
}
;
console.log(saludar("Yony"));
