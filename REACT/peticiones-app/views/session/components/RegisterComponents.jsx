import {useForm} from 'react-hook-form'
export const RegisterComponents = () => {

  const {register, handleSubmit} = useForm()
  
  const onSubmitForm = (data) => {
    console.log(data);
    
  }
  return (
    <div>
      Register

      <form onSubmit={handleSubmit(onSubmitForm)}>
        <label className="form-label" {...register('email')}>Email:</label>
        <input type="text" className="form-control"/>
        <label className="form-label"{...register('password')}>Password</label>
        <input type="text" className="form-control"/>
        <button>Send</button>
      </form>
      </div>
  )
}
