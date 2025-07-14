function AumentoSalarial(nombre, salario, categoria) {
    let aumento = 0;
    let totalSalario = 0;

    switch (categoria) {
        case "A":
            aumento = salario * 0.15;
            break;
        case "B":
            aumento = salario * 0.30;
            break;
        case "C":
            aumento = salario * 0.10;
            break;
        case "D":
            aumento = salario * 0.20;
            break;
        default:
            console.log("Datos inválidos");
            return; 
    }

    totalSalario = salario + aumento;

    console.log(
        `Nombre: ${nombre} - Salario: $${salario} - Categoria: ${categoria} - Aumento: $${aumento.toFixed(2)} - Salario Con Aumento: $${totalSalario.toFixed(2)}`
    );
}

AumentoSalarial("Jose", 100, "A");
AumentoSalarial("Alex", 100, "B");
AumentoSalarial("Wendy", 100, "C");
AumentoSalarial("Manuel", 100, "D");
AumentoSalarial("Yony", 100, "F");
