import { FontAwesomeIcon } from '@fortawesome/react-fontawesome'
import { faEarthAmericas } from '@fortawesome/free-solid-svg-icons'

function Publicaciones() {
    return (
        <div className="flex flex-col w-full">
            <div className="flex flex-row pr-3 pl-3">
                <img className="h-12 aspect-square" src="https://media.licdn.com/dms/image/D4E0BAQGTRAHntOfgTg/company-logo_100_100/0/1667698674172?e=1704931200&v=beta&t=e6i4THvej2BCDFqHkx9VL4yeaZx3da023qnhyfMWS-M" alt="" />
                <div className="flex flex-col ml-2">
                    <span className="font-bold text-base">Universidad Nacional Autónoma de Honduras (UNAH)</span>
                    <span className="text-sm text-gray-600">96.174 seguidores</span>
                    <span className="text-xs text-gray-600">6 dias <FontAwesomeIcon icon={faEarthAmericas} /></span>
                </div>
            </div>
            <div>
                <div  className="pl-3 pr-3 text-sm">
                <span>El Programa de Educación Continúa en Salud de la Facultad de Ciencias Médicas de la UNAH presenta su oferta de cursos y diplomados en salud a iniciar en octubre.
                </span>
                </div>
                <img className='w-full' src="https://media.licdn.com/dms/image/D4E22AQEOJ48IHnPiNg/feedshare-shrink_800/0/1696370114963?e=1700092800&v=beta&t=M-nAnIphL-ATlnOO2TuWl5SCuCyazd-oPKR7VQ4S7Jw" alt="" />
            </div>
        </div>
    )
}

export default Publicaciones