var Cuenta = /** @class */ (function () {
    function Cuenta(nombre, cantidad, tipoCuenta, numeroCuenta) {
        this.nombre = nombre;
        this.cantidad = cantidad;
        this.tipoCuenta = tipoCuenta;
        this.numeroCuenta = numeroCuenta;
    }
    Cuenta.prototype.depositar = function () {
        if (this.cantidad < 5) {
            console.log("El valor a depositar debe ser mayor a $5.00");
        }
        else {
            console.log("Se ha depositado correctamente $".concat(this.cantidad.toFixed(2)));
        }
    };
    Cuenta.prototype.retirar = function (valor) {
        if (valor < 5) {
            console.log("El valor a retirar debe ser mayor a $5.00");
            return;
        }
        if (this.cantidad <= 0) {
            console.log("No hay nada en la cuenta.");
            return;
        }
        if (valor > this.cantidad) {
            console.log("Saldo insuficiente para realizar el retiro.");
            return;
        }
        this.cantidad -= valor;
        console.log("Has retirado $".concat(valor.toFixed(2), ". Saldo restante: $").concat(this.cantidad.toFixed(2)));
    };
    Cuenta.prototype.mostrarDatos = function () {
        console.log("Nombre: ".concat(this.nombre));
        console.log("Tipo de cuenta: ".concat(this.tipoCuenta));
        console.log("N\u00FAmero de cuenta: ".concat(this.numeroCuenta));
    };
    return Cuenta;
}());
var cuentita = new Cuenta("Yony Benítez", 10, "Ahorros", "123456789");
cuentita.depositar();
cuentita.retirar(4); // Retiro menor a $5.00 ERROR
cuentita.retirar(6);
cuentita.mostrarDatos();
