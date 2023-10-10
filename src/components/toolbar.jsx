import { FontAwesomeIcon } from '@fortawesome/react-fontawesome'
import { faCommentDots,faMagnifyingGlass } from '@fortawesome/free-solid-svg-icons'
import './toolbar.css'

function ToolBar() {
    return (
        <nav className="flex flex-row items-center p-3 sticky">
            <div className='rounded-full overflow-hidden'>
                <img src="https://media.licdn.com/dms/image/D5635AQGXW0U7XhrOLA/profile-framedphoto-shrink_400_400/0/1660002666757?e=1697518800&v=beta&t=qdw2xxM80VEEH30yxKzFs4I78J8C77w4oSRNqOz8wcQ" alt="logo" className="w-8 aspect-square" />
            </div>
            <div className='flex-3 w-full ml-2 mr-3 wrapper' >
                <div className="icon flex flex-row items-center"><FontAwesomeIcon icon={faMagnifyingGlass} /> <span className='ml-1'>Buscar</span></div>
                <input className='w-full bg-gray-100 rounded p-2' type="text"  />
            </div>
            <div>
                <FontAwesomeIcon icon={faCommentDots} />
            </div>
        </nav>
    )
}

export default ToolBar