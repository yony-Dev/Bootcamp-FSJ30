function TiendaCoches(nombre) {

    nombre = nombre.toUpperCase();
    switch (nombre) {
        case "FORD FIESTA":
            console.log(`El descuento al coche ${nombre} es de un 5%`);
            
            break;
        case "FORD FOCUS":
            console.log(`El descuento al coche ${nombre} es de un 10%`);
            
            break;
        case "FORD ESCAPE":
            console.log(`El descuento al coche ${nombre} es de un 20%`);
            
            break;
    
        default:
            console.log("Coche no valido");
            
            break;
    }
}
TiendaCoches("FORD FOCUS");
TiendaCoches("FORD fiesta");