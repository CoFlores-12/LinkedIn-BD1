import { FontAwesomeIcon } from '@fortawesome/react-fontawesome'
import { faHouseChimney, faGlobe, faSquarePlus, faBell, faSuitcase } from '@fortawesome/free-solid-svg-icons'
import Items from './items'

function NavBar() {
    return (
        <div className='fixed flex flex-row justify-between bottom-0 w-full pl-2 pr-2 pt-1 pb-1'>
           <Items value='Inicio' icon={<FontAwesomeIcon icon={faHouseChimney} />} />
           <Items value='Mi red' icon={<FontAwesomeIcon icon={faGlobe} />} />
           <Items value='Publicar' icon={<FontAwesomeIcon icon={faSquarePlus} />} />
           <Items value='Publicaciones' icon={<FontAwesomeIcon icon={faBell} />} />
           <Items value='Empleos' icon={<FontAwesomeIcon icon={faSuitcase} />} /> 
        </div>
    )
}

export default NavBar