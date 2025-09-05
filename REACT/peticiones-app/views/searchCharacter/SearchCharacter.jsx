import { useForm } from "react-hook-form"
import { useState } from "react"
import { CardCharacter } from "../../src/components/CardCharacter"
const API_URL = "https://rickandmortyapi.com/api/character/?name="

export const SearchCharacter = () => {
    const {register, handleSubmit} = useForm()
    const [character,setCharacter] = useState({
        name: ""
    })

    const onSubmitForm = (data) => {
        console.log(data);
        console.log(`${API_URL}${data.name}`);
        //console.log(API_URL+data.name);
        
        fetch(`${API_URL}${data.name}`)
        .then(response => response.json())
        .then(character => {
            console.log(character.results[0]);
            setCharacter(character.results[0])
        })
    }

  return (
    <div >
        <section className="row justify-content-center">
        <h3 className="text-center">Search a character from Rick and Morty </h3>
        <div className="card col-6">
        <section className="card-body">
            <form className="form-group" onSubmit={handleSubmit(onSubmitForm)}>
                <label className="form-label">Name of character</label>
                <input className="form-control" type="text" placeholder="Search Character" {...register('name')}/>
                <button className="btn btn-primary mt-2">Search</button>
            </form>
        </section>
        </div>
        </section>

        { character.name === "" ? null : 
        <section className="row justify-content-center">
        <div className="col-md-6 col-sm-12">
        <CardCharacter 
            id={character.id}
          name={character.name}
          image={character.image}
          status={character.status}
         /> 
         </div>
         </section>}
    </div>
  )
}

//rafc