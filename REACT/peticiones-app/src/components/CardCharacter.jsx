export const CardCharacter = ({id,name,image,status,listFavorites = null,changeFavorites}) => {

  /* Parte logica para poder utilizar la lista de favoritos */
  const handleAddToFavorites = () => {
    //Logica para guardar en favoritos
  //console.log({id,name,image,status});
  // Propagacion de datos -> Mantener los valores anteriores y agregarle unos nuevos
  // Se da con callback -> arrayAnterior => [...arrayAnterior]
  // [...arrayAnterior] ... SpreadOperator, los 3 puntitos le dicen que saque lo que ya estaba
  // en el array anterior y guarde
  changeFavorites( prevArray => [...prevArray, {id,name,image,status}] )
  
}

const handleDeleteToFavorites = () => {
  changeFavorites(listFavorites.filter((favorite) => favorite.id !== id));

}

const findCharacterInFavorites = () => {
  return listFavorites.find((favorite) => favorite.id === id)
}

//console.log(listFavorites);
  return (
    <div>
        <div className="card mt-4 mt-2" style={{height: '60vh'}}>
  <img src={image} className="card-img-top" alt="image-character" />
  <div className="card-body">
    <h5 className="card-title">{name}</h5>
    <p className="card-text">{status}</p>

    {listFavorites ? (findCharacterInFavorites() ? <button className="btn btn-danger" onClick={handleDeleteToFavorites} >Delete to Favorites</button> 
    : <button className="btn btn-primary" onClick={handleAddToFavorites} >Add to Favorites</button>)
    :null}
    
  </div>
</div>

    </div>
  )
}