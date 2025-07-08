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