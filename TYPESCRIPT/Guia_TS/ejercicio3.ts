class Cancion {
    public titulo: string;
    public genero: string;
    private autor: string;
    constructor(tituloParam:string, generoParam:string) {
        this.titulo = tituloParam;
        this.genero = generoParam;
    }

    public getAutor():string{
        return this.autor;
    }
    public setAutor(imprimirAutor:string):void{
        this.autor = imprimirAutor;
    }

    public datos():void{   
        console.log(`Titulo: ${this.titulo}\n Genero: ${this.genero}\n Autor: ${this.autor}`);
    }
}

let tema = new Cancion("Oye mi amor","Banda");
tema.setAutor("Maná")
tema.datos();
