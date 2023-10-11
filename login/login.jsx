/* eslint-disable react/prop-types */
import logo from '../src/assets/logo.svg'
export default function Login({setView}){
  return (
    <div className='p-5 pt-9'>
    <img src={logo} alt="" width={50} className='w-[105px] mb-4' />
    <div className='flex flex-col w-full justify-center items-center'>
      <div style={{width: '70%'}} className='flex flex-col'>
        <h1 className='header'>Iniciar sesión</h1>
        <p className='text-sm'>Mantente al día de tu mundo profesional</p>
        <div className="form__group">
            <input type="text" className="form__field w-100" placeholder="Input text" />
            <label htmlFor="name" className="form__label"> Email or phone </label>
        </div>
        <div className="form__group">
            <input type="text" className="form__field w-100" placeholder="Input text" />
            <label htmlFor="name" className="form__label"> Password </label>
        </div>
        <a className='btnIni' href="/app//"><button >Inicia sesion</button></a>
        <span className='mt-5'>¿Estás empezando a usar LinkedIn? <span className='txt-pri' onClick={() => setView('signin')}>Unirse ahora</span></span>
      </div>
    </div>
  </div>
  )
}