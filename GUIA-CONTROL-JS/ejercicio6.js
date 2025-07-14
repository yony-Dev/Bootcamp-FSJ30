function Viajes(origen, destino) {
    origen = origen.replace(/\s/g, "").toUpperCase();
    destino = destino.replace(/\s/g, "").toUpperCase();

    if (origen === "PALMA") {
        if (destino === "LACOSTADELSOL") {
            console.log("El descuento es de un 5%");
            
        } else if(destino === "PANCHIMALCO"){
            console.log("El descuento es de un 10%");
            
        }else if (destino === "PUERTOELTRIUNFO") {
            console.log("El descuento es de un 15%");
            
        }else{
            console.log("Destino no disponible");
            
        }
    }else{
        console.log("Origen no disponible");
        
    }
}
Viajes("palma", "Panchimalco")
Viajes("Palma", "Puerto el triunfo")