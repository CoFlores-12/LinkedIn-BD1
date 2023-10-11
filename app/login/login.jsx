/* eslint-disable react/prop-types */
"use client"
import Image from 'next/image'
export default function Login({setView}){
  const login = () => {
    const email = document.getElementById("12").value;
		const password = document.getElementById("13").value;
		if (email === "" || password === "") {
			return;
		}
		const options = {method: 'POST', body: `{"password":"${password}","email":"${email}"}`};

		fetch('/api/login', options)
		.then(response => response.json())
		.then(response => {
			if (response.data === 400) {
				alert(response.error);
				return
			}
			location.href = '/home';
		})
		.catch(err => console.error(err));
  }
  return (
    <div className='p-5 pt-9'>
    <Image src="/logo.svg" alt="" width={50} height={50} className='w-[105px] mb-4' />
    <div className='flex flex-col w-full justify-center items-center'>
      <div style={{width: '70%'}} className='flex flex-col'>
        <h1 className='header'>Iniciar sesión</h1>
        <p className='text-sm'>Mantente al día de tu mundo profesional</p>
        <div className="form__group">
            <input type="text" id='12' className="form__field w-100" placeholder="Input text" />
            <label htmlFor="name" className="form__label"> Email or phone </label>
        </div>
        <div className="form__group">
            <input type="text" id='13' className="form__field w-100" placeholder="Input text" />
            <label htmlFor="name" className="form__label"> Password </label>
        </div>
        <button onClick={login} className='btnIni'>Inicia sesion</button>
        <span className='mt-5'>¿Estás empezando a usar LinkedIn? <span className='txt-pri' onClick={() => setView('signin')}>Unirse ahora</span></span>
      </div>
    </div>
  </div>
  )
}