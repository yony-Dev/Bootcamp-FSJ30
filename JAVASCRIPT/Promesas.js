//Peticiones asincronas

/*
    LAS PROMESAS TIENEN 3 ESTADOS
    Pending => Todavia no hay una respuesta
    Response (Resolve) => Si la promesa se cumplio
    Rejected => Si la promesa no se cumplio
*/

console.log("Holiwis");

//Simular una peticion a una API

function getCoach(id) {
    return new Promise((resolve, reject) => {
        setTimeout(() => {
            if (id === 1) {
                resolve({id:1, name:"Yony"})
            } else {
                reject("No se encontro ese coach");
            }
        }, 2000);
    });
};
//Manejo de asincronismo

//
function traerDatos() {

    getCoach(1)
    .then((data)=>{
        console.log(data);
    })
    .catch((error)=>{
        console.error(error);
    })
}
//traerDatos();

//Async y await
async function obtenerDatos() {
    try {
        const coach = await getCoach(1);
        console.log(coach);
    } catch (error) {
        console.error(error);
    }
    
    
}
//obtenerDatos()

//Fetch -> va a ser nuestro metodo (interfaz) para hacer peticiones http
async function getDittoawait() {
    try { //Manejo de errores
        let respuesta = await fetch('https://pokeapi.co/api/v2/pokemon/ditto')//Espera a traer la respueta
        console.log(respuesta); //Ver que respuesta nos da la API
        let cuerpo = await respuesta.json();//Obtenemos el cuerpo de esa respuesta anterior
        console.log(cuerpo);//Mostrar el cuerpo
        
    } catch (error) { //Manejo de errores
        console.log(error);
        
    }
}
//getDittoawait();

function getDitto() {
    fetch('https://pokeapi.co/api/v2/pokemon/ditto')//Buscar los datos de la API
    .then((data)=>{ //Decimos a js que espere a que vuelva con la respuesta
        console.log(data); //Nos va dar meta datos
        return data.json(); //Retorna la data para usarla despues, SOLO EL BODY EN TIPO JSON
    })
    .then((data)=>{ //Voy a utilizar el body que retorne antes 
        console.log(data);//Muestra el cuerpo, ahi estan los datos
        
    })
    .catch((error)=>{
        console.error(error);
        
    })
}
//getDitto();

function Saludar() {
    console.log("Hola...");
    getDitto();
}