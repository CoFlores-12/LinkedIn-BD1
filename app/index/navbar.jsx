import Image from "next/image";
import Link from "next/link";
import './nav.css'

export default function Navbar() {
    return (
        <div className="navbar flex flex-row justify-between items-center pt-3 pl-2 pr-2">
            <Image className="w-100 md:w-[128px]" src="/logo.svg" alt="logo" width={90} height={77} />
            <div className="navbar__session flex flex-row items-center ">
                <div className="navbar__links flex flex-row items-center ">
                    
                </div>
                <Link href="/login?signin=true" >Unirse ahora</Link>
                <Link className="btnIni" href="/login">Inicia sesion</Link>
            </div>
        </div>
    )
}