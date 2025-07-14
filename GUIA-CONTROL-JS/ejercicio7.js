let valores = [24, -5, 0, 15, 30, -20, 8, -60, 60, 3];

let negativos = 0;
let positivos = 0;
let multiplosDe15 = 0;
let sumaPares = 0;

for (let i = 0; i < valores.length; i++) {
    let valor = valores[i];

    if (valor < 0) {
        negativos++;
    } else if (valor > 0) {
        positivos++;
    }

    if (valor % 15 === 0) {
        multiplosDe15++;
    }

    if (valor % 2 === 0) {
        sumaPares += valor;
    }
}

console.log(`Cantidad de valores negativos: ${negativos}`);
console.log(`Cantidad de valores positivos: ${positivos}`);
console.log(`Cantidad de múltiplos de 15: ${multiplosDe15}` );
console.log(`Suma de números pares: ${sumaPares}`);
