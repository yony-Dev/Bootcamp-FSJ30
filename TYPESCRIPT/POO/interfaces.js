//Ejemplo de uso de interfaces en Poo
//Ejemplo simple  -> No es una estructura que usariamos en un proyecto
var Animal = /** @class */ (function () {
    function Animal(nombreParam, especieParam) {
        this.nombre = nombreParam;
        this.especie = especieParam;
    }
    Animal.prototype.comer = function () {
        return "Estoy comiendo";
    };
    ;
    Animal.prototype.getAnimal = function () {
        return this;
    };
    return Animal;
}());
var animal1 = new Animal("firu", "Perro");
console.log(animal1.getAnimal());
