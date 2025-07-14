function numeroMayor(primerNumero, segundoNumero) {
    if (primerNumero > segundoNumero) {
        console.log(`El numero ${primerNumero} es mayor que ${segundoNumero}`);

    }else if(segundoNumero>primerNumero){
        console.log(`El numero ${segundoNumero} es mayor que ${primerNumero}`);

    }else if (primerNumero === segundoNumero) {
        console.log("Los numeros son iguales");
        
    }else{
        console.log("Debes ingresar dos numeros");
        
    }
}
numeroMayor(100,80);
numeroMayor(150,200);
numeroMayor(100,100);