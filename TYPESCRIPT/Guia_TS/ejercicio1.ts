class CabeceraPagina {
    private titulo: string;
    private color: string;
    private fuente: string;
    private alineacion: string;

    constructor(titulo: string, color: string, fuente: string) {
        this.titulo = titulo;
        this.color = color;
        this.fuente = fuente;
        this.alineacion = "izquierda"; // valor definido
    }

    obtenerPropiedades(): string {
        return `Título: ${this.titulo}\nColor: ${this.color}\nFuente: ${this.fuente}`;
    }

    configurarAlineacion(alineacion: string): void {
        if (["centrado", "derecha", "izquierda"].includes(alineacion.toLowerCase())) {
            this.alineacion = alineacion.toLowerCase();
        } else {
            console.log("Alineación no válida. Usando alineación por defecto (izquierda).");
        }
    }

    imprimir(): void {
        console.log("=== Propiedades de la página ===");
        console.log(this.obtenerPropiedades());
        console.log(`Alineación del título: ${this.alineacion}`);
    }
}

let pagina = new CabeceraPagina("TypeScript", "Rojo", "Visual Studio");
pagina.configurarAlineacion("centrado");
pagina.imprimir();
