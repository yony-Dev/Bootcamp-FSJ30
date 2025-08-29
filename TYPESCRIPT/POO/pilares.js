//Paradigma -> modelo de programar
//Que programamos bajo unas reglas en especifico
//Codigo reutilizable
//Se basa en el uso de objetos y clases para organizar y estructurar el codigo
//Es un paradigma que esta orientada a clases y objetos
var __extends = (this && this.__extends) || (function () {
    var extendStatics = function (d, b) {
        extendStatics = Object.setPrototypeOf ||
            ({ __proto__: [] } instanceof Array && function (d, b) { d.__proto__ = b; }) ||
            function (d, b) { for (var p in b) if (Object.prototype.hasOwnProperty.call(b, p)) d[p] = b[p]; };
        return extendStatics(d, b);
    };
    return function (d, b) {
        if (typeof b !== "function" && b !== null)
            throw new TypeError("Class extends value " + String(b) + " is not a constructor or null");
        extendStatics(d, b);
        function __() { this.constructor = d; }
        d.prototype = b === null ? Object.create(b) : (__.prototype = b.prototype, new __());
    };
})();
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
var Animal = /** @class */ (function () {
    //constructor
    function Animal(especieParam, edadParam, generoParam, colorParam) {
        this.especie = especieParam;
        this.edad = edadParam;
        this.genero = generoParam;
        this.color = colorParam;
    }
    //Métodos -> Funciones que van a pertenecer a una clase "COMPORTAMIENTO"
    Animal.prototype.comer = function () {
        return "Estoy comiendo";
    };
    //Getters y setters
    Animal.prototype.getEdad = function () {
        return this.edad;
    };
    Animal.prototype.setEdad = function (edadParam) {
        this.edad = edadParam;
    };
    //Abstracción 
    Animal.prototype.aumnetarEdad = function () {
        this.edad += 1;
    };
    return Animal;
}());
var animal1 = new Animal("Chucho", 18, "Masculino", "Blanco");
//Accedemos a un atributo del objeto creado en base a una clase
console.log(animal1.especie);
//console.log(animal1.edad);
console.log(animal1.getEdad());
var Perro = /** @class */ (function (_super) {
    __extends(Perro, _super);
    function Perro(especieParam, edadParam, generoParam, colorParam, razaParam, nombreParam) {
        //Traemos la funcionalidad del padre
        var _this = _super.call(this, especieParam, edadParam, generoParam, colorParam) || this;
        _this.raza = razaParam;
        _this.nombre = nombreParam;
        return _this;
    }
    Perro.prototype.ladrar = function () {
        return "Guau!";
    };
    //Polimorfismo
    Perro.prototype.aumnetarEdad = function () {
        this.setEdad(this.getEdad() + 7);
    };
    return Perro;
}(Animal));
var perro1 = new Perro("Perro", 5, "Femenino", "Blanco", "Scott", "Miníni");
