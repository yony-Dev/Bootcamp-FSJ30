class Calculadora {
    private primerNumero:number;
    private segundoNumero: number; 

    constructor(num1Param:number, num2Param:number) {
        this.primerNumero = num1Param;
        this.segundoNumero = num2Param;
    }

    sumar():number{
        return this.primerNumero + this.segundoNumero;
    }
    restar():number{
        return this.primerNumero - this.segundoNumero;
    }
    multiplicar():number{
        return this.primerNumero * this.segundoNumero;
    }
    dividir():number{
        if (this.segundoNumero === 0) {
            console.log("Error: No se puede dividir entre cero.");
            return NaN;
        }
        return this.primerNumero / this.segundoNumero;
    }
    potencia(base: number, exponente: number): number {
        return Math.pow(base, exponente);
    }

    factorial(): number {
        if (this.primerNumero < 0) {
            console.log("Error: El factorial no está definido para números negativos.");
            return NaN;
        }
        let resultado = 1;
        for (let i = 1; i <= this.primerNumero; i++) {
            resultado *= i;
        }
        return resultado;
    }
}

let calcular = new Calculadora(10,5);
console.log("Suma", calcular.sumar());
console.log("Resta", calcular.restar());
console.log("Multiplicación", calcular.multiplicar());
console.log("División", calcular.dividir());
console.log("Potencia", calcular.potencia(2, 4));
console.log("Suma", calcular.factorial());
