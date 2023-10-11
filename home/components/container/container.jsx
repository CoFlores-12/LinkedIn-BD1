/* eslint-disable react/prop-types */
import Publicaciones from "../publicaciones/publicaciones";
import { useEffect } from 'react';
import React from 'react';

function Container({ view}) {
    const [data, setData] = React.useState([])
    useEffect(() => {   
        fetch('/api/publicaciones')
            .then((response) => response.json())
            .then((data) => setData(data))
    }, [])
    const selectView = (view) => {
        switch (view) {
            case 'home':
                return data.map((publicacion) => {
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
        <div className='container pb-9 w-full' style={{background: '#E9E5DF'}}>
            {selectView(view)}
        </div>
    )
}

export default Container;