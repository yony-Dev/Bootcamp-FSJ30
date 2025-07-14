function Edades (nombre, edad) {
    
    return edad >= 18 
    ? `${nombre} es mayor de edad`
    : edad > 0 
    ? `${nombre} es menor de edad` 
    : `Edad ingresada inválida`
};

console.log(Edades("Yony", 19)); //Mayor de edad
console.log(Edades("Alex", 16)); //Menor de edad
console.log(Edades("Messi", -10)); //Edad inválida

