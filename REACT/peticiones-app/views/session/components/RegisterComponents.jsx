import {useForm} from 'react-hook-form'
import * as yup from 'yup'
import { yupResolver } from "@hookform/resolvers/yup"
import { createUserWithEmailAndPassword } from 'firebase/auth'
import { auth } from '../../../src/repositories/config'

const schema = yup.object({
  email: yup.string().email("Please enter a correct format: email@email.com").required(),
  password: yup.string().required().min(8,"Please enter a min 8 char")
  .matches(/[A-Z]/, 'pleace enter a 1 char in mayus')
  .matches(/[a-z]/, 'pleace enter a 1 char in minus')
  .matches(/[0-9]/, 'pleace enter a 1 char number')
  .matches(/[!@#$%&*?.,_:<>"|]/, 'pleace enter a 1 special char '),
  confirm_password: yup.string().oneOf([yup.ref("password"),null],'Check our password')
})

export const RegisterComponents = () => {

  const {register, handleSubmit, formState:{errors}} = useForm({
    resolver: yupResolver(schema)
  })
  
  const onSubmitForm = (data) => {
    console.log(data);

    //Firebase
    createUserWithEmailAndPassword(auth, data.email, data.password)
  .then((userCredential) => {
    // Signed up 
    const user = userCredential.user;
    console.log(user);
    
    alert('User successfully registered')
    // ...
  })
  .catch((error) => {
    const errorCode = error.code;
    const errorMessage = error.message;
    console.log(errorCode);
    console.log(errorMessage);
    
    
    // ..
  });
    
  }
  return (
    <div>
     <section className="row justify-content-center">
      <div className="col-6">
    <div className="card">
      <div className="card-body">
        <h2 className="card-title text-center">Sign up</h2>
      <form onSubmit={handleSubmit(onSubmitForm)}>
      <label className="form-label" >Email: </label>
      <input type="email" className="form-control" name="input_email" {...register('email')} />
      <p className='text-danger'>{errors.email &&  errors.email.message}</p>
      <label className="form-label">Password: </label>
      <input type="password" className="form-control" name="input_password" {...register('password')}/>
      <p className='text-danger'>{errors.password &&  errors.password.message}</p>
      <label className="form-label">Confirm Password: </label>
      <input type="password" className="form-control" {...register('confirm_password')}/>
      <p className='text-danger'>{errors.confirm_password &&  errors.confirm_password.message}</p>
      <button type="submit" className='btn btn-success'>Send</button>
    </form>
    </div>
    </div>
    </div>
    </section>
    </div>
  )
}
