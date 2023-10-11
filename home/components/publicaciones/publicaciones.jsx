import { FontAwesomeIcon } from '@fortawesome/react-fontawesome'
import { faEarthAmericas } from '@fortawesome/free-solid-svg-icons'
import PropTypes from 'prop-types';
import likeImg from '../../../src/assets/likeIMG.svg';
import likeLogo from '../../../src/assets/like.svg';
import comment from '../../../src/assets/comment.svg';
import share from '../../../src/assets/share.svg';

function Publicaciones({empresa, seguidores, tiempo, contenido, imagen, logo, likes}) {
    const fecha = new Date(tiempo);
    const fechaActual = new Date();
    const diff = parseInt((fechaActual.getTime() - fecha.getTime())/(1000*60*60*24));
    return (
        <div className="flex flex-col w-full mt-1 mb-2 bg-white">
            <div className="flex flex-row pr-3 pl-3 pt-2" style={{textOverflow: 'ellipsis', overflow:'hidden', whiteSpace:'nowrap'}}>
                <img className="h-12 aspect-square" src={logo} alt="" />
                <div className="flex flex-col ml-2 text-color-text-low-emphasis">
                    <span className="text-black text-base" style={{textOverflow: 'ellipsis', overflow:'hidden', whiteSpace:'nowrap'}}>{empresa}</span>
                    <span className="text-xs text-gray-600">{seguidores} seguidores</span>
                    <span className="text-xs text-gray-600">{diff} dias <FontAwesomeIcon className='ml-1' icon={faEarthAmericas} /></span>
                </div>
            </div>
            <div>
                <div  className="pl-3 pr-3 text-sm">
                <span>{contenido}</span>
                </div>
                <img className='w-full' src={imagen} alt="" />
            </div>
            <div className='pr-3 pl-3 pt-2 pb-2'>
                <div className=' flex flex-row text-xs'>
                <img alt="" data-reaction-type="LIKE" src={likeImg} className="lazy-loaded likeIcon mr-1" />
                    {likes}
                </div>
                <div className='w-full flex flex-row justify-between items-center'>
                    <button className='text-base text-gray-600 hover:bg-gray-100 p-2 flex flex-row items-center'>
                        <img className='mr-1' src={likeLogo} width={24} height={24} alt="" /> Recomendar
                    </button>
                    <button className='text-base text-gray-600 hover:bg-gray-100 p-2 flex flex-row items-center'>
                        <img className='mr-1' src={comment} width={24} height={24} alt="" />Comentar
                    </button>
                    <button className='text-base text-gray-600 hover:bg-gray-100 p-2 flex flex-row items-center'>
                        <img className='mr-1' src={share} width={24} height={24} alt="" />Compartir
                    </button>

                </div>
            </div>
        </div>
    )
}
Publicaciones.propTypes = {
    empresa: PropTypes.string.isRequired,
    seguidores: PropTypes.number.isRequired,
    tiempo: PropTypes.string.isRequired,
    contenido: PropTypes.string.isRequired,
    imagen: PropTypes.string.isRequired,
    logo: PropTypes.string.isRequired,
    likes: PropTypes.number.isRequired,
};
export default Publicaciones