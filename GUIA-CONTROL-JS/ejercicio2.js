function notaFinal(nombre, carnet, notaExa, notaTar, notaAsis, notaInv) {
    let examen = notaExa * 0.20;
    let tareas = notaTar * 0.40;
    let asistencia = notaAsis * 0.10;
    let investigacion = notaInv * 0.30;

    let notaF = examen + tareas + asistencia + investigacion;
    console.log(`Nombre: ${nombre} - Carnet: ${carnet} - Nota Final: ${notaF.toFixed(2)}`);
    
}

notaFinal("Yony", "K2025", 8,9,7,9);