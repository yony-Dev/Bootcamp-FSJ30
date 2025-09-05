import { useForm } from "react-hook-form";
import * as yup from 'yup'
import { yupResolver } from "@hookform/resolvers/yup";
import { signInWithEmailAndPassword } from "firebase/auth";
import { auth } from "../repositories/config";

const schema =yup.object({
    email: yup.string().email("Please enter a correct format: email@email.com").required(),
    password: yup.string().required().min(8,"Please enter a min 8 char")
})
export const LoginComponents = () => {
    const {register, handleSubmit, formState: {errors}} = useForm();
    resolver : yupResolver(schema)

    const onSubmitForm = (data) =>{
        console.log(data);
        
        //Firebase
        signInWithEmailAndPassword(auth, data.email, data.password)
  .then((userCredential) => {
    // Signed in 
    const user = userCredential.user;
        console.log(user);
        
  })
  .catch((error) => {
    const errorCode = error.code;
    const errorMessage = error.message;
    console.error(errorCode);
    console.error(errorMessage);
  });

    }

   
  return (
    <section className="row justify-content-center">
      <div className="col-6">
    <div className="card">
      <div className="card-body">
        <h2 className="card-title text-center">Sign in</h2>
         <form onSubmit={handleSubmit(onSubmitForm)}>
      <label className="form-label" >Email: </label>
      <input type="email" className="form-control" name="input_email" {...register('email')} />
      <p className='text-danger'>{errors.email &&  errors.email.message}</p>
      <label className="form-label">Password: </label>
      <input type="password" className="form-control" {...register('password')}/>
      <p className='text-danger'>{errors.password &&  errors.password.message}</p>
      <button type="submit" className="btn btn-primary">Send</button>
    </form>
    </div>
    </div>
    </div>
    </section>
  )
}
