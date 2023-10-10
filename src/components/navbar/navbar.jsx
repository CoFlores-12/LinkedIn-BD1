/* eslint-disable react/prop-types */
import Items from './items'
import home from '../../assets/homeIcon.svg'
import red from '../../assets/redIcon.svg'
import post from '../../assets/postIcon.svg'
import noti from '../../assets/notiIcon.svg'
import jobs from '../../assets/empleosIcon.svg'

function NavBar({setView}) {
    return (
        <div className='fixed flex flex-row justify-between bottom-0 w-full pl-8 pr-8 pt-2 pb-1 bg-white'>
            <button onClick={()=>setView("home")}>
                <Items value='Inicio' icon={home} />
            </button>
            <button onClick={()=>setView('red')}>
                <Items value='Mi red' icon={red} />
            </button>
            <button onClick={()=>setView('post')}>
                <Items value='Publicar' icon={post} />
            </button>
            <button onClick={()=>setView('noti')}>
                <Items value='Notificaciones' icon={noti} />
            </button>
            <button onClick={()=>setView('jobs')}>
                <Items value='Empleos' icon={jobs} />
            </button>
        </div>
    )
}

export default NavBar