//Crear nuestro primer componente
import { useState } from "react";
import { Chauchis } from "./chauchis";
//Props -> Propiedades
function Saludo({name, lastname}) { 
  

  //EL ESTADO -> hook -> funciones Prehechas que ya vienen con react
  const [nameCurso, setNameCurso] = useState("FSJ30");


  return (
  <>
      <h1>Hola, Soy {name} {lastname}</h1>

      <h2>Curso: {nameCurso} </h2>
      <button onClick={() => setNameCurso("Java30")}>Magia!</button>
      <button onClick={() => setNameCurso("FSJ30")}>Regresar!</button>
      <br />
      
      <Chauchis name={name} curso={nameCurso}/>
  </>)
}

export default Saludo;