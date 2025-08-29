//Ejemplo de uso de interfaces en Poo

//Ejemplo simple  -> No es una estructura que usariamos en un proyecto

class Animal{
    //Limitamos el acceso a nombre y especie ENCAPSULAMIENTO
    private nombre: string;
    private especie: string;

    constructor(nombreParam:string, especieParam:string){
        this.nombre = nombreParam;
        this.especie = especieParam;
    }

    comer(): string{
        return "Estoy comiendo"
    };
    getAnimal():Animal{
        return this; //Retorna los atributos del objeto
    }
}
let animal1 = new Animal("firu", "Perro");
console.log(animal1.getAnimal());


//Los extends avisan de que estamos usando la HERENCIA
class Gato extends Animal implements IAnimal{
    //Estos dos atributos son públicos
    raza:string;
    color:string;

    constructor(nombreParam:string, especieParam:string, razaParam:string, colorParam:string){
        super(nombreParam,especieParam);
        this.raza = razaParam;
        this.color = colorParam;
    }
    hacerRuido():string{
        return "Miau!"
    }
};

//Implements le avisa a js y ts que la clase Perro OBLIGATORIAMENTE debe de tener lo que declara IAnimal 
class Perro extends Animal implements IAnimal{
    raza:string;
    color:string;

    hacerRuido():string{
        return "Guau!"
    }
};

interface IAnimal{
    //Los atibutos tienen que ser publicos
    raza:string;
    color:string;

    //Los metodos tienen que ser publicos
    hacerRuido():string;
}
