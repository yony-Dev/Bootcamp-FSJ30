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
let numerito = 1; //JS
let numero:number = 1;//TS
let nombre:string = "Yony";
let activo:boolean = true;
let vacio: null = null;

//Tipos de datos que no se deben usar
let random:any = "Puedo ser cualquier cosa";
let indefinidos:undefined = undefined;


console.log(numerito);
console.log(numero);
 
//Declaración de funciones 
function saludar(nombre:string):string {
    return `Holiwis, ${nombre}`
};
console.log(saludar("Yony"));

//Estrucutura de datos

//Array
let arraycito:number[] | string[] = [1,2,3,4];
arraycito = ["Nuevo"];

//Vamos a guardar dentro del Array, numeros o strings
let arrayDobleDato:(number | string)[] = [123, "Número de la suerte", 456]

//Tuplas 
let arraEspecifico : [number, string] = [19, "Yony"];

//Podemos llegar a tener 2 tipos de datos 
let dosDatos:null|string =null;
dosDatos = ""; 

type Persona = {
    name: string;
    age: number
}
let progrmador: Persona = {name: "Yony", age: 19};

let fsj30: Persona[] = [{name: "Alex", age:20}, {name:"Jose", age:21}];
