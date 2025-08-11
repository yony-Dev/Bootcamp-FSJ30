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
// Persona abstracta
var Persona = /** @class */ (function () {
    function Persona(nombre, apellido, direccion, telefono, edad) {
        this.nombre = nombre;
        this.apellido = apellido;
        this.direccion = direccion;
        this.telefono = telefono;
        this.edad = edad;
    }
    Persona.prototype.verificarEdad = function () {
        if (this.edad >= 18) {
            console.log("".concat(this.nombre, " ").concat(this.apellido, " es mayor de edad."));
        }
        else {
            console.log("".concat(this.nombre, " ").concat(this.apellido, " es menor de edad."));
        }
    };
    return Persona;
}());
// Empleado que hereda de Persona
var Empleado = /** @class */ (function (_super) {
    __extends(Empleado, _super);
    function Empleado(nombre, apellido, direccion, telefono, edad) {
        var _this = _super.call(this, nombre, apellido, direccion, telefono, edad) || this;
        _this.sueldo = 0;
        return _this;
    }
    Empleado.prototype.cargarSueldo = function (sueldo) {
        this.sueldo = sueldo;
    };
    Empleado.prototype.imprimirSueldo = function () {
        console.log("Sueldo: $".concat(this.sueldo.toFixed(2)));
    };
    Empleado.prototype.mostrarDatos = function () {
        console.log("DATOS DEL EMPLEADO\nNombre: ".concat(this.nombre));
        console.log("Apellido: ".concat(this.apellido));
        console.log("Direcci\u00F3n: ".concat(this.direccion));
        console.log("Tel\u00E9fono: ".concat(this.telefono));
        console.log("Edad: ".concat(this.edad));
    };
    return Empleado;
}(Persona));
var empleado1 = new Empleado("Yomy", "Benítez", "Morazan", "1234-5678", 25);
empleado1.verificarEdad();
empleado1.cargarSueldo(999.00);
empleado1.mostrarDatos();
empleado1.imprimirSueldo();
