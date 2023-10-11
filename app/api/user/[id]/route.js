import { NextRequest, NextResponse } from "next/server";
const users = [
    {
        id: 0,
        email: 'admin',
        phone: 'admin',
        password: 'admin',
        name: 'admin'
    },
    {
        id: 1,
        name: 'Universidad ',
        banner: 'https://media.licdn.com/dms/image/D4E3DAQFYI0PppESHRg/image-scale_191_1128/0/1673930997753/unahoficial_cover?e=1697662800&v=beta&t=wOViColGaH2gBlVlNhB8qHnaFDIUJfI18mmW-c7sOqc',
        photo: 'https://media.licdn.com/dms/image/D4E0BAQGTRAHntOfgTg/company-logo_200_200/0/1667698674172?e=1704931200&v=beta&t=n8bExi1G4kvQkpjyFu_GWMMjSlqdw1Te8-URrwSwGyA',
        category: 'Enseñanza superior',
        location: 'Tegucigalpa, francisco morazán',
        followers: 96.246,
        info: 'Cuenta oficial de la Universidad Nacional Autónoma de Honduras (UNAH), ¡Bienvenidos(as) PUMAS!'
    }
]
export async function GET(request) {
    let response = null
    const items = users.filter(item => item.id === 1)
    if (items.length === 0) {
        return NextResponse.json({ error: "data invalid",  data : 400 },  { status: 400 })
    }
    response = NextResponse.json(
        items,
        { success: true },
        { status: 200, headers: { "content-type": "application/json" } }
    );
      
    return response
}