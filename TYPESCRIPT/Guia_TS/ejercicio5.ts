// Persona abstracta
abstract class Persona {
    protected nombre: string;
    protected apellido: string;
    protected direccion: string;
    protected telefono: string;
    protected edad: number;

    constructor(nombre: string, apellido: string, direccion: string, telefono: string, edad: number) {
        this.nombre = nombre;
        this.apellido = apellido;
        this.direccion = direccion;
        this.telefono = telefono;
        this.edad = edad;
    }

    public verificarEdad(): void {
        if (this.edad >= 18) {
            console.log(`${this.nombre} ${this.apellido} es mayor de edad.`);
        } else {
            console.log(`${this.nombre} ${this.apellido} es menor de edad.`);
        }
    }

    public abstract mostrarDatos(): void;
}

// Empleado que hereda de Persona
class Empleado extends Persona {
    private sueldo: number;

    constructor(nombre: string, apellido: string, direccion: string, telefono: string, edad: number) {
        super(nombre, apellido, direccion, telefono, edad);
        this.sueldo = 0;
    }

    public cargarSueldo(sueldo: number): void {
        this.sueldo = sueldo;
    }

    public imprimirSueldo(): void {
        console.log(`Sueldo: $${this.sueldo.toFixed(2)}`);
    }

    public mostrarDatos(): void {
        console.log(`DATOS DEL EMPLEADO\nNombre: ${this.nombre}`);
        console.log(`Apellido: ${this.apellido}`);
        console.log(`Dirección: ${this.direccion}`);
        console.log(`Teléfono: ${this.telefono}`);
        console.log(`Edad: ${this.edad}`);
    }
}

let empleado1 = new Empleado("Yomy", "Benítez", "Morazan", "1234-5678", 25);
empleado1.verificarEdad();
empleado1.cargarSueldo(999.00);
empleado1.mostrarDatos();
empleado1.imprimirSueldo();
