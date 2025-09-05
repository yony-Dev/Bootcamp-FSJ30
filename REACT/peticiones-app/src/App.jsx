
import { ListCharacther } from '../views/listCharacters/ListCharacther'
import { FavoritesDataProvider } from './contexts/FavoritesContexts'
import {BrowserRouter, Link, Route,  Routes} from 'react-router'
import { SessionView } from '../views/session/SessionView'
import { Navbar } from './components/Navbar'
import { SearchCharacter } from '../views/searchCharacter/SearchCharacter'
//Asincronismo -> manejar código que tarda en completarse como solicitudes a un servidor o lecturas de archivos, sin bloquear el resto del programa
//Promesa -> La ezperanza de una posible respuesta a eso que se va tardar
function App() {

  return (
    <>
    <FavoritesDataProvider>
     
    {/*Activamos react Router */}
    <BrowserRouter>
      <Navbar/>
      <main className='container'>
    <Routes>
      <Route path='/' element={<ListCharacther />}/>
      <Route path='/session' element={<SessionView />}/>
      <Route path='/search-character' element={<SearchCharacter />}/>
    </Routes>
    </main>
    </BrowserRouter>


    </FavoritesDataProvider>
      
    </>
  )
}

export default App
