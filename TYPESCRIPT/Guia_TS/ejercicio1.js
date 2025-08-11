var CabeceraPagina = /** @class */ (function () {
    function CabeceraPagina(titulo, color, fuente) {
        this.titulo = titulo;
        this.color = color;
        this.fuente = fuente;
        this.alineacion = "izquierda"; // valor por defecto
    }
    CabeceraPagina.prototype.obtenerPropiedades = function () {
        return "T\u00EDtulo: ".concat(this.titulo, "\nColor: ").concat(this.color, "\nFuente: ").concat(this.fuente);
    };
    CabeceraPagina.prototype.configurarAlineacion = function (alineacion) {
        if (["centrado", "derecha", "izquierda"].includes(alineacion.toLowerCase())) {
            this.alineacion = alineacion.toLowerCase();
        }
        else {
            console.log("Alineación no válida. Usando alineación por defecto (izquierda).");
        }
    };
    CabeceraPagina.prototype.imprimir = function () {
        console.log("=== Propiedades de la página ===");
        console.log(this.obtenerPropiedades());
        console.log("Alineaci\u00F3n del t\u00EDtulo: ".concat(this.alineacion));
    };
    return CabeceraPagina;
}());
var pagina = new CabeceraPagina("TypeScript", "Rojo", "Visual Studio");
pagina.configurarAlineacion("centrado");
pagina.imprimir();
