/* eslint-disable react/prop-types */
import Items from './items'
let home = '/assets/homeIcon.svg'
let red = '/assets/redIcon.svg'
let post = '/assets/postIcon.svg'
let noti = '/assets/notiIcon.svg'
let jobs = '/assets/empleosIcon.svg'

function NavBar({setView}) {
    return (
        <div className='fixed flex flex-row bottom-0 w-full pl-1 pr-1 pt-2 pb-1 bg-white text-color-text-low-emphasis'>
            <button className='flex-1' onClick={()=>setView("home")}>
                <Items value='Inicio' icon={home} />
            </button>
            <button className='flex-1' onClick={()=>setView('red')}>
                <Items value='Mi red' icon={red} />
            </button>
            <button className='flex-1' onClick={()=>setView('post')}>
                <Items value='Publicar' icon={post} />
            </button>
            <button className='flex-1' onClick={()=>setView('noti')}>
                <Items value='Notificaciones' icon={noti} />
            </button>
            <button className='flex-1' onClick={()=>setView('jobs')}>
                <Items value='Empleos' icon={jobs} />
            </button>
        </div>
    )
}

export default NavBar