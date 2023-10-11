/* eslint-disable react/prop-types */
"use client"
import Image from 'next/image'
export default function Signin({setView}){
  return (
    <div className='p-3 pt-3'>
    <Image src="/logo.svg" height={50} alt="" width={50} className='w-[95px] mb-4' />
    <div className='flex flex-col w-full justify-center items-center pt-5'>
        <h1 className='headerS'>Saca el máximo partido a tu vida profesional</h1>
      <div style={{width: '70%'}} className='flex flex-col pt-4'>
        <div className="form__group">
            <input type="text" className="form__field w-100" placeholder="Input text" />
            <label htmlFor="name" className="form__label"> Email or phone </label>
        </div>
        <div className="form__group">
            <input type="text" className="form__field w-100" placeholder="Input text" />
            <label htmlFor="name" className="form__label"> Password </label>
        </div>
        <a className='btnIni' href="/home/"><button >Aceptar y unirse</button></a>
        <span className='mt-5'>¿Ya estás LinkedIn? <span className='txt-pri' onClick={() => setView('login')}>Iniciar sesión</span></span>
      </div>
    </div>
  </div>
  )
}