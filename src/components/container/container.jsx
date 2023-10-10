/* eslint-disable react/prop-types */
import PropTypes from 'prop-types';
import Publicaciones from "../publicaciones/publicaciones";

function Container({publicaciones = [], view}) {
    const selectView = (view) => {
        switch (view) {
            case 'home':
                return publicaciones.map((publicacion) => {
                    return <Publicaciones key={publicacion.id} {...publicacion} />
                })
            case 'red':
                return <h1>Red</h1>
            case 'post':
                return <h1>Post</h1>
            case 'noti':
                return <h1>Noti</h1>
            case 'jobs':
                return <h1>Jobs</h1>
            default:
                break;
        }
    }
    return (
        <div className='container pb-9' style={{background: '#E9E5DF'}}>
            {selectView(view)}
        </div>
    )
}

Container.propTypes = {
    publicaciones: PropTypes.array
};

export default Container;