//console.log("holiwis");
const contenedorCarrito = document.getElementById('cuerpoCarrito')
let cursoCarrito = [];

function vaciarCarrito(evento) {
    console.log("soy el vaciar carrito");
    
    cursoCarrito=[];
    contenedorCarrito.innerHTML="";
}

function agregarCurso(evento) {
    console.log("soy el agregar curso");
    //console.log(evento.target.parentElement.parentElement);

    let curso =leerDatosCurso(evento.target.parentElement.parentElement);
    console.log(curso);

    //Ver si el curso existe y guardamos un true o false
    const existe = cursoCarrito.some((cursoArr)=> cursoArr.id === curso.id)
    if (existe) {
        cursoCarrito.map((cursoArr)=>{
            if (cursoArr.id === curso.id) {
                cursoArr.cantidad += 1;

                //Aumentar precio
                //Utlizar un metodo de string que pueda quitar el primer caracter
                //Metodos posibles = Substring o Slice
                let precioActual = parseFloat(cursoArr.precio.substring(1));
                //Transformar de string a int
                //parse int
                //cursoArr.precio = parseFloat(cursoArr.precio)
                //aumentamos el precio
                precioActual += 15;
                //Regresamos el precio a su forma original
                cursoArr.precio = `$${precioActual}`;
                return cursoArr
            }
        })
    } else {
      cursoCarrito.push(curso);  
    }
    
    console.log(cursoCarrito);
    pintarCarritoHTML();
}

function leerDatosCurso(curso) {
    console.log(curso);
    
    console.log(curso.querySelector('a').getAttribute('data-id'));
    console.log(curso.querySelector('img').src);
    console.log(curso.querySelector('h4').textContent);
    console.log(curso.querySelector('h5').textContent);
    
    const infoCurso ={
        id: curso.querySelector('a').getAttribute('data-id'),
        imagen: curso.querySelector('img').src,
        nombre: curso.querySelector('h4').textContent,
        precio: curso.querySelector('h5').textContent,
        cantidad: 1
    }
    return infoCurso;
}

function pintarCarritoHTML() {
    contenedorCarrito.innerHTML = "";
    //contenedorCarrito.innerHTML = "<h1>Agregado</h1>"
    cursoCarrito.map((curso)=>{
        //Crear una fila
        let fila = document.createElement('tr');
        //Asignar los valores en celdas
        fila.innerHTML = `
        <td> <img src="${curso.imagen}" width="100" ></td>
        <td> ${curso.nombre}</td>
        <td> ${curso.precio}</td>
        <td> ${curso.cantidad}</td>
        <td> <a class="btn btn-danger" onclick="eliminarCurso('${curso.id}')">Eliminar</a></td>
        `
        contenedorCarrito.appendChild(fila);
    })
}

function eliminarCurso(id) {
    cursoCarrito = cursoCarrito.map((curso) => {
        if (curso.id === id) {
            curso.cantidad -= 1;

            // Restar el precio 
            let precioActual = parseFloat(curso.precio.substring(1));
            precioActual -= 15;
            curso.precio = `$${precioActual}`;
        }
        return curso;
    }).filter((curso) => curso.cantidad > 0); 

    pintarCarritoHTML();
}
