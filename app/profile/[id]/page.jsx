"use client"
import ToolBar from '@/app/components/toolbar/toolbar';
import Image from 'next/image';
import { useEffect } from 'react';
import React from 'react';

export default function Profile({ params }) {
    const [loading, setLoading] = React.useState(true)
    const [data, setData] = React.useState([])

    useEffect(() => {   
        fetch(('/api/user/' + params.id), { method: 'GET' })
            .then((response) => response.json())
            .then((data) => {
                setData(data[0])
                setLoading(false)
            })
    }, [])
  return (
    <div>
      <ToolBar />
      <div >
        <img src={data.banner} alt="avatar" className='w-full'  width={100} height={100}/>
        <div className='relative pt-10'>
          <img src={data.photo} alt="avatar" className='w-20 absolute top-[-70%]' width={10} height={100}/>
          <h1>{data.name}</h1>
          <p>{data.description}</p>
        </div>
      </div>
    </div>
  )
}
