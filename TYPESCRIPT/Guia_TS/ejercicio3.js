var Cancion = /** @class */ (function () {
    function Cancion(tituloParam, generoParam) {
        this.titulo = tituloParam;
        this.genero = generoParam;
    }
    Cancion.prototype.getAutor = function () {
        return this.autor;
    };
    Cancion.prototype.setAutor = function (imprimirAutor) {
        this.autor = imprimirAutor;
    };
    Cancion.prototype.datos = function () {
        console.log("Titulo: ".concat(this.titulo, "\n Genero: ").concat(this.genero, "\n Autor: ").concat(this.autor));
    };
    return Cancion;
}());
var tema = new Cancion("Oye mi amor", "Banda");
tema.setAutor("Maná");
tema.datos();
