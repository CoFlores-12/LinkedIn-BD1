import './toolbar.css'
import search from '../assets/searchIcon.svg';
import mess from '../assets/menssageIcon.svg'

function ToolBar() {
    return (
        <nav className="flex flex-row items-center p-3 sticky">
            <div className='rounded-full overflow-hidden'>
                <img src="https://media.licdn.com/dms/image/D5635AQGXW0U7XhrOLA/profile-framedphoto-shrink_400_400/0/1660002666757?e=1697518800&v=beta&t=qdw2xxM80VEEH30yxKzFs4I78J8C77w4oSRNqOz8wcQ" alt="logo" className="w-8 aspect-square" />
            </div>
            <div className='flex-3 w-full ml-2 mr-3 wrapper text-gray-500' >
                <div className="icon flex flex-row items-center Hdr_nav_search_box">
                    <img className='mr-1' src={search} width={30} height={30} alt="" /> <span className='ml-1'>Buscar</span>
                </div>
                <input className='w-full Hdr_nav_search_input bg-gray-100 rounded p-2' />
            </div>
            <div>
            <img className='mr-1' src={mess} width={24} height={24} alt="" />
            </div>
        </nav>
    )
}

export default ToolBar