var Calculadora = /** @class */ (function () {
    function Calculadora(num1Param, num2Param) {
        this.primerNumero = num1Param;
        this.segundoNumero = num2Param;
    }
    Calculadora.prototype.sumar = function () {
        return this.primerNumero + this.segundoNumero;
    };
    Calculadora.prototype.restar = function () {
        return this.primerNumero - this.segundoNumero;
    };
    Calculadora.prototype.multiplicar = function () {
        return this.primerNumero * this.segundoNumero;
    };
    Calculadora.prototype.dividir = function () {
        if (this.segundoNumero === 0) {
            console.log("Error: No se puede dividir entre cero.");
            return NaN;
        }
        return this.primerNumero / this.segundoNumero;
    };
    Calculadora.prototype.potencia = function (base, exponente) {
        return Math.pow(base, exponente);
    };
    Calculadora.prototype.factorial = function () {
        if (this.primerNumero < 0) {
            console.log("Error: El factorial no está definido para números negativos.");
            return NaN;
        }
        var resultado = 1;
        for (var i = 1; i <= this.primerNumero; i++) {
            resultado *= i;
        }
        return resultado;
    };
    return Calculadora;
}());
var calcular = new Calculadora(10, 5);
console.log("Suma", calcular.sumar());
console.log("Resta", calcular.restar());
console.log("Multiplicación", calcular.multiplicar());
console.log("División", calcular.dividir());
console.log("Potencia", calcular.potencia(2, 4));
console.log("Suma", calcular.factorial());
