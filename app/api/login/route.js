import { NextRequest, NextResponse } from "next/server";
import { SignJWT } from "jose";
import { getJwtSecretKey } from "@/libs/auth";
const users = [
    {
        id: 0,
        email: 'admin',
        phone: 'admin',
        password: 'admin',
        name: 'admin'
    }
]
export async function POST(request) {
    let response = null
    const res = await request.json()
    if (!res.email) {
        response = NextResponse.json({ error: 'email is required' },
        { status: 500 })
        return response
    } else if (!res.password) {
        response = NextResponse.json({ error: 'Password is required' }, { status: 500 })
        return response
    }else {
        console.log(res);
        const items = users.filter(item => (item.email === res.email || item.phone === res.email) && item.password === res.password)
        if (items.length === 0) {
            return NextResponse.json({ error: "email or Password invalid",  data : 400 },
            { status: 400 })
        }
        
        const token = await new SignJWT({
            id: items[0]._id,
            role: items[0].role, 
          })
            .setProtectedHeader({ alg: "HS256" })
            .setIssuedAt()
            .setExpirationTime("30m") // Set your own expiration time
            .sign(getJwtSecretKey());
      
        response = NextResponse.json(
            { success: true },
            { status: 200, headers: { "content-type": "application/json" } }
          );
      
        response.cookies.set({
            name: "token",
            value: token,
            path: "/",
          });
    }
    return response
}