/* eslint-disable react/prop-types */
import Publicaciones from "../publicaciones/publicaciones";
import { useEffect } from 'react';
import React from 'react';

function Container({view}) {
    const [loading, setLoading] = React.useState(true)
    const [data, setData] = React.useState([])
    useEffect(() => {   
        fetch('/api/getdata')
            .then((response) => response.json())
            .then((data) => {
                setData(data)
                setLoading(false)
            })
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
        <div className='W h-full pb-9 w-full flex items-center flex-col' style={{background: '#E9E5DF'}}>
            {loading ? <h1>Cargando...</h1> : selectView(view)}
        </div>
    )
}

export default Container;