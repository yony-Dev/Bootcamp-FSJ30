import './App.css'
import { ListCharacther } from '../views/listCharacters/ListCharacther'
import { FavoritesDataProvider } from './contexts/FavoritesContexts'
import {BrowserRouter, Route, Routes} from 'react-router'
import { SessionView } from '../views/session/SessionView'
//Asincronismo -> manejar código que tarda en completarse como solicitudes a un servidor o lecturas de archivos, sin bloquear el resto del programa
//Promesa -> La ezperanza de una posible respuesta a eso que se va tardar
function App() {

  return (
    <>
    <FavoritesDataProvider>
    {/*Activamos react Router */}
    <BrowserRouter>
    <Routes>
      <Route path='/' element={<ListCharacther/>}/>
      <Route path='/session' element={<SessionView/>}/> 
    </Routes>
    </BrowserRouter>


    </FavoritesDataProvider>
      
    </>
  )
}

export default App
