//Paradigma -> modelo de programar
//Que programamos bajo unas reglas en especifico
//Codigo reutilizable
//Se basa en el uso de objetos y clases para organizar y estructurar el codigo
//Es un paradigma que esta orientada a clases y objetos

/*
    POO -> Es una forma de pensar al momento de programar
    Vamos a imaginar moldes para poder estandarizar las cosas "Clases"
    Utilizar los moldes para crear funcionalidad en nuestra app "Objetos"
*/
/*
  Pilares de POO
  -Herencia -> Obtener las caracteristicas y comportamientos del padre
  -Polimorfismo  -> Podemos cambial el funcionamineto

  -Encapsulamiento -> Limitar el acceso a la imformación
  --- Modificadores de acceso: Public, Protected, Private, Default=public
  -Abstracción -> nos da herraminetas y metodos para acceder a la imformación limitada
*/
class Animal {
    //Atributos o propiedades -> Caracteristicas de esta clase
    public especie: string;
    private edad: number;
    genero: string;
    color: string;
    
    //constructor
    constructor(especieParam:string, edadParam:number, generoParam:string, colorParam:string) {
        this.especie = especieParam;
        this.edad = edadParam;
        this.genero = generoParam;
        this.color = colorParam;
    }
    //Métodos -> Funciones que van a pertenecer a una clase "COMPORTAMIENTO"
    comer():string{
        return "Estoy comiendo";
    }

    //Getters y setters
    getEdad():number{
        return this.edad;
    }
    setEdad(edadParam:number){
        this.edad = edadParam;
    }
    //Abstracción 
    aumnetarEdad(){
        this.edad += 1;
    }
    
}

const animal1 = new Animal("Chucho",18,"Masculino","Blanco");
//Accedemos a un atributo del objeto creado en base a una clase
console.log(animal1.especie);
//console.log(animal1.edad);
console.log(animal1.getEdad());

class Perro extends Animal {
    private raza:string;
    private nombre:string;

    constructor(especieParam:string, edadParam:number, generoParam:string, colorParam:string, razaParam:string, nombreParam:string){
        //Traemos la funcionalidad del padre
        super(especieParam, edadParam, generoParam, colorParam);
        this.raza = razaParam;
        this.nombre = nombreParam;
    }
    ladrar():string{
        return "Guau!"
    }

    //Polimorfismo
    aumnetarEdad():void {
        this.setEdad(this.getEdad()+7)
    }
}
const perro1 = new Perro("Perro",5,"Femenino","Blanco","Scott","Miníni" );

//Tipo personalizado 

type User ={
    name : string,
    email : string,
    password : string,
    rol : string
}

let usuario2:User = {
    name:"Yony",
    email:"yony-dev@gmail.com",
    password: "contra",
    rol : "Admin"
}

interface IUser { 
    name : string,
    email : string,
    password : string,
    rol : string

    login():string;
}
let usuario3:IUser = {
    name:"Yony",
    email:"yony-dev@gmail.com",
    password: "contra",
    rol : "Admin",
    login():string {
        return "logeado"
    }
}

