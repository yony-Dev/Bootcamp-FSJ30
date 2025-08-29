//rafc -> sniper para crear el componente funcional con flecha

import { useContext, useEffect, useState } from "react"
import { CardCharacter } from "../../src/components/CardCharacter"
import { FavoritesContext } from "../../src/contexts/FavoritesContexts"

export const ListCharacther = () => {

    const [listPjs, setListPjs] = useState([])
    
    //Utilizamos el useContext
    //Sintaxis para cuando tenemos un solo valor en el contexto
    // const valorContexto = useContext(FavoritesContext)
    // console.log(valorContexto);
    
    const {favorites, setFavorites} = useContext(FavoritesContext)
    

    const peticionApi = () => {
    //Peticion a una API 
    fetch('https://rickandmortyapi.com/api/character')
    .then(response => response.json())
    .then(data => {
        //console.log(data);
        setListPjs(data.results);
    })
    .catch(error => console.error(error))
  }
//  console.log(listPjs);
  

  // const peticionApiAA = async () =>{
  //   try{
  //       let response = await fetch('https://rickandmortyapi.com/api/character')

  //       let data = await response.json();
  //       console.log(data);
  //   }catch(error){
  //       console.error(error);
  //   }
  // }
  //uso del ussEffec
  useEffect(() => {
    peticionApi()
  }, [])
  return (
    <div className="row">
        
        {/* Recorrer el array para mostrar los datos -> Mapear los datos para pintarlos */}
        
        {listPjs.map( (character) => {
        return <section key={character.id} className="col-md-3 col-sm-12">
          <CardCharacter
            id={character.id}
            name= {character.name}
            image = {character.image}
            status = {character.status}
            listFavorites = {favorites}
            changeFavorites = {setFavorites}
          />
          </section> 
        })}
    </div>
  )
}
