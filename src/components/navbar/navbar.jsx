import logo from '../../../src/assets/logo.svg'
function NavBar() {
    return (
        <nav className="flex flex-row items-center justify-between pt-3 pr-3 pl-3">

            <a href="/?trk=guest_homepage-basic_nav-header-logo" className="nav__logo-link link-no-visited-state z-1 mr-auto babybear:z-0 babybear:mr-0 babybear:flex-1 hover:no-underline focus:no-underline active:no-underline" data-tracking-control-name="guest_homepage-basic_nav-header-logo" data-tracking-will-navigate="">
                <icon className="block text-color-brand w-[84px] h-[21px] papabear:w-[135px] papabear:h-[34px] order-1 lazy-loaded" data-test-id="nav-logo" aria-hidden="true" aria-busy="false">
                    <img src={logo} width={100}  alt="" />
                </icon>
            </a>
            <div className="nav__cta-container order-3 flex gap-x-1 justify-end min-w-[100px] items-center flex-nowrap flex-shrink-0 babybear:flex-wrap flex-2">
                <a className="nav__button-tertiary mr-3 btn-md btn-tertiary text-black" data-tracking-control-name="guest_homepage-basic_nav-header-join" data-tracking-will-navigate="">
                    Unirse ahora
                </a>
                <a className="nav__button-secondary ml-3 btn-md btn-secondary-emphasis txt-pri" data-tracking-control-name="guest_homepage-basic_nav-header-signin" data-tracking-will-navigate="">
                    Inicia sesión
                </a>
            </div>
        </nav>
    )
}

export default NavBar