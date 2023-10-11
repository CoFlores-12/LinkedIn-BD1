"use client"
import Navbar from "./index/navbar";
import Link from 'next/link'
import './index.css'

export default function Home() {
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
    <div >
      <Navbar />
     <div className="containera pl-2 pr-2 pt-10 relative">
        <div className="w-full md:w-[50%]">
          <h1 style={{fontSize:'25px', fontWeight:'300'}}>¡Te damos la bienvenida a tu comunidad profesional!</h1>
          <div className="form__group mt-4">
              <input type="text" id="12" className="form__field w-100" placeholder="Input text" />
              <label htmlFor="name" className="form__label"> Email or phone </label>
          </div>
          <div className="form__group mt-4">
              <input type="password" id="13" className="form__field w-100" placeholder="Input text" />
              <label htmlFor="name"  className="form__label"> Password </label>
          </div>
          <button className="btnIni" onClick={login}>Inicia sesion</button>
        </div>
        <img className="invisible md:visible flip-rtl block z-[-1] w-[700px] h-[560px] absolute top-10 right-0 flex-shrink babybear:w-[374px] babybear:h-[214px] babybear:static" alt="¡Te damos la bienvenida a tu comunidad profesional!" data-test-id="hero__illustration" src="https://static.licdn.com/aero-v1/sc/h/dxf91zhqd2z6b0bwg85ktm5s4"></img>
    </div>
  </div>
  )
}
