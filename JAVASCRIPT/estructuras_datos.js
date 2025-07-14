//Estructura de datos

// Datos premitivos -> string, interger, float, double, bool, null
//UNDEFINED -> Vacio para el sistema
let vacio = null;
console.log(vacio);

vacio = "string re estandar"
console.log(vacio);


//Objetos
//Objetos literales y se pueden utilizar para un formulario con datos de usuario

let perro = {
    //clave = valor
    nombre : "Chochan",
    edad : 4
}
let perro2 = {
    nombre : "minini",
    edad : 7
}

//Mostrar una caracteristica del perro
console.log(perro.nombre);

//POO -> Programacion orientada a objetos 
//Es una forma de escribir codigo para que sea reutilizable

//Clase y Objeto
//Clase -> Molde
//Objeto -> Instancia de una clase (Creamos algo en base a ...)

class Persona {
    //Caracteristicas de una clase -> Atributos o propiedades
    //Constructor -> metodo para crear objetos a traves de este molde

    constructor(nombreParam, edadParam) {
        this.nombre = nombreParam;
        this.edad = edadParam;
    }

    //Metodos -> Funciones, cosas que hace esta clase 
    correr(){
        console.log("Estoy corriendo");
        
    }
}
//Utilizar el constructor de persona -> Instansear objetos
let persona1 = new Persona("Yony", 19);
let persona2 = new Persona("Alex", 20);

console.log(persona1);
console.log(persona2);

//Acceder a un objeto
persona1.correr()

//Pilares de POO
//Existen para asegurarnos un codigo mas escalable, flexible y seguro
//4 pilares

//Pilares que si se pueden utilizar en js
//Herencia -> una clase hija de otra, copia el comportamiento del padre
//Polimorfismo -> caambiar el comportamiento de un padre, con respecto a su hijo

//Herencia
class Programador extends Persona{
    //caracteristicas propias de clase programador
    constructor(nombreParam, edadParam, lenguajePrograParam){
        //seguir usando las propiedades del padre
        super(nombreParam, edadParam);

        this.lenguajeProgra = lenguajePrograParam;
    }

    //metodo propio de programador
    codear(){console.log("Estoy codeando");
    }

    //POLIMORFISMO
    correr(){
        super.correr()
        console.log("No corro tan rapido, pero camino rapido");   
    }
}

//Crear un programador
let programador1 = new Programador("Jonathan", 17, "JavaScript");
console.log(programador1);
programador1.correr()


//Pilares que no se pueden utilizar en java script
//Encapsulamiento -> Limitar el acceso a la imformacion de una clase
//Abstraccion -> nos da herramientas o metodos para imformacion limitada o encapsulada


//ARRAYS
//Array indexado -> Ordena el indice 0 en adelante
let arraysitoIdx = [18,19,25,33];

console.log(arraysitoIdx[0]);

//"Array asociativo" -> guardamos en clave valor
let arrayAsociativo ={
    nombre:"Yony"
}
console.log(arrayAsociativo['nombre']);

//Array multidimensional
//Creamos con varias dimensiones (Array dentro de otro array)
let arraycitoMulti = [ [1,2], [{nombre: "Yony"}]];
console.log(arraycitoMulti[0]);

//Accedemos a la posicion 0 -> Es la primera del array
let cajaDeIndiceCero = arraycitoMulti[0];
console.log(cajaDeIndiceCero[1]);

//Accedemos a la posicion 1
let cajaIndiceUno = arraycitoMulti[1];
//Accedemos a la caja para poder ver su contenido
console.log(cajaIndiceUno[0]);

//estos console.log muestran el nombre
console.log(cajaIndiceUno[0].nombre);
console.log(arraycitoMulti[1][0].nombre);


//Metodos para arrays 
//Recorrer arrays

let nombres = ["Darwin", "Luz", "Alejandra", "Kevin" ];
//dar vueltas al array
let nombresAlReves = nombres.reverse();

//ForEach -> Recorrer el arrays y nos deja utilizar, la posicion y el indice del array
nombres.forEach((value, index) => {
    console.log(index);
    console.log(value);   
})

// for(let nombre of nombres){
//     console.log(nombre);   
// }

// Metodos utiles
// Map -> Recorre el valor y nos retorna algo por cada posicion -> transformar valores

let nombres2 = ["Darwin", "Luz", "Alejandra", "Kevin" ];

let nombresMayus = nombres2.map((value)=>{
    return value.toUpperCase();
});
console.log(nombresMayus);

let numeritos = [1,2,3,4,]

let numeritosPorDos = numeritos.map((value)=>{
    return value*2
})
console.log(numeritosPorDos);


//ForeEach que reciba el array completo

let arrayNum = [1,2,3,4,6];

arrayNum.forEach((value,index,array)=>{
    arrayNum.pop();
    console.log(array);   
});


//Filtrar informacion
//Filter -> Filtramos la info y la retornamos en base a una condicion

const usuarios = [{
    nombre: "Yony",
    edad: 19
},{
    nombre: "Alex",
    edad: 20
},{
    nombre: "Joan",
    edad: 17
}];
const mayoresDe18 = usuarios.filter((value) => {return value.edad > 18})
console.log(mayoresDe18);

//Find => buscamos y retornamos un solo dato
const usuarioAlex = usuarios.find(usuario => usuario.nombre === "Alex");
console.log(usuarioAlex);


//Metodos OBLIGATORIOS
let array = [];
//Agregar datos al array al final
array.push(2);

//Agregar datos al array al inicio
array.unshift(1);


//Eliminar datos del array al final
array.pop();
//Eliminar datos del array al principio
array.shift()

console.log(array);

//Obtener el largo de un array
let largor = array.length;
console.log("Holiwis". length);

//Metodo para eliminar los espacios en un String
let sinEspacios = "Holiwis Yony  ".trim();
console.log(sinEspacios.length);
