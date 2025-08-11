class Cuenta {
    private nombre: string;
    private cantidad: number;
    private tipoCuenta: string;
    private numeroCuenta: string;

    constructor(nombre: string, cantidad: number, tipoCuenta: string, numeroCuenta: string) {
        this.nombre = nombre;
        this.cantidad = cantidad;
        this.tipoCuenta = tipoCuenta;
        this.numeroCuenta = numeroCuenta;
    }

    depositar(): void {
        if (this.cantidad < 5) {
            console.log("El valor a depositar debe ser mayor a $5.00");
        } else {
            console.log(`Se ha depositado correctamente $${this.cantidad.toFixed(2)}`);
        }
    }

    retirar(valor: number): void {
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
        console.log(`Has retirado $${valor.toFixed(2)}. Saldo restante: $${this.cantidad.toFixed(2)}`);
    }

    mostrarDatos(): void {
        console.log(`Nombre: ${this.nombre}`);
        console.log(`Tipo de cuenta: ${this.tipoCuenta}`);
        console.log(`Número de cuenta: ${this.numeroCuenta}`);
    }
}

let cuentita = new Cuenta("Yony Benítez", 10, "Ahorros", "123456789");

cuentita.depositar();      
cuentita.retirar(4);       // Retiro menor a $5.00 ERROR
cuentita.retirar(6);       
cuentita.mostrarDatos();   
