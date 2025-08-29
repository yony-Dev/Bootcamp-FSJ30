import './App.css'
import Saludo from './components/Saludo'

function App() {

  return (  
    <> {/*Este es el fragment */}
    {/*Este es el primer componente */}
      <Saludo name='Yony' lastname= 'Benitez'/> 
      <Saludo name='Alexander' lastname='Salazar'/> 

    </>
  )
}

export default App
