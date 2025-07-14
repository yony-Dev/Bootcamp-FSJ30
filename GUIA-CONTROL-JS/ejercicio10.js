let edadesManana = [18, 20, 19, 21, 22];
let edadesTarde = [17, 19, 18, 20, 21, 22];
let edadesNoche = [22, 23, 24, 21, 20, 22, 23, 24, 25, 21, 20];

function calcularPromedio(lista) {
    let suma = lista.reduce((a, b) => a + b, 0);
    return suma / lista.length;
}

let promedioManana = calcularPromedio(edadesManana);
let promedioTarde = calcularPromedio(edadesTarde);
let promedioNoche = calcularPromedio(edadesNoche);

console.log(`Promedio turno mañana: ${promedioManana.toFixed(0)} años`);
console.log(`Promedio turno tarde: ${promedioTarde.toFixed(0)} años`);
console.log(`Promedio turno noche: ${promedioNoche.toFixed(0)} años`);

let mayorPromedio;
let turnoMayor;

if (promedioManana > promedioTarde && promedioManana > promedioNoche) {
    mayorPromedio = promedioManana;
    turnoMayor = "mañana";
} else if (promedioTarde > promedioNoche) {
    mayorPromedio = promedioTarde;
    turnoMayor = "tarde";
} else {
    mayorPromedio = promedioNoche;
    turnoMayor = "noche";
}

console.log(`El turno con mayor promedio de edad es el turno ${turnoMayor} (${mayorPromedio.toFixed(0)} años)`);
