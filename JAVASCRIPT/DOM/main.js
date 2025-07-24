console.log("Prueba");


//Obtenemos un elemento del frontend HTML
let elementoDOM = document.getElementById('textoSaludo');
console.log(elementoDOM);

let contenidoDOM = document.querySelector('#contenido');
console.log(contenidoDOM);

const btnApretable = document.querySelector('#botonMagico')

const btnArraycito = document.getElementById('btnArraycito')

//Propiedades de los elementos
//InnerHTML => Obtiene todo el contenido del html
//InnerText => Obtiene solo el texto del elemento
console.log(elementoDOM.innerHTML);
console.log(elementoDOM.innerText);

elementoDOM.innerHTML = "<h2>Actualización</h2>"

contenidoDOM.innerHTML = "<h3>Esto es con JS</h3>"

//Metodos de los elementos
getCoach(1);

btnApretable.addEventListener('click',()=>{
    alert('Alerta!!!');
    console.log("Funciono el boton");
    let dato = prompt("Ingresame el nombre")
    console.log(dato);
    
    elementoDOM.style.fontFamily = "sans-serif";
    elementoDOM.style.color = "red"
    elementoDOM.style.marginLeft = "2rem"
})

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

//Metodo de JS
//Almacenar datos  en local para el usuario

let  arraycito = [1,2,3]
console.log(arraycito);

//LocalStorage -> Almacenamiento en el local en el navegador del usuario
//esta diseñado para guardar objetos
localStorage.setItem('arraycito',JSON.stringify(arraycito));
let datita = localStorage.getItem('arraycito');
//Mostramos los datos del localStorage
console.log(datita);
//Devolver la data a su estado original
let datitaArray = JSON.parse(datita);
console.log(datitaArray);


btnArraycito.addEventListener('click', ()=>{
    console.log("Estoy andando");
    arraycito.push(4);
    console.log(arraycito);

    localStorage.setItem('arraycito',JSON.stringify(arraycito));
    console.log(localStorage.getItem('arraycito'));
})
