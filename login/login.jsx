import ReactDOM from 'react-dom/client'
import NavBar from './components/navbar/navbar'
import './login.css'

ReactDOM.createRoot(document.getElementById('root')).render(
  <div>
    <NavBar />
    <div className='flex flex-col'>
      <h1>¡Te damos la bienvenida a tu comunidad profesional!</h1>
      <input type="text" />
      <input type="text" />
      <button>Inicia sesion</button>
    </div>
  </div>
)
