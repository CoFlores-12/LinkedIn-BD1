<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LinkedIn | Home</title>
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <link rel="stylesheet" href="{{ URL::asset('css/home.css')}}">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/1e8824e8c2.js" crossorigin="anonymous"></script>
</head>
<body>
    <nav class="flex flex-row items-center p-3 sticky">
        <div class='rounded-full overflow-hidden'>
            <img src="https://media.licdn.com/dms/img/D5635AQGXW0U7XhrOLA/profile-framedphoto-shrink_400_400/0/1660002666757?e=1697518800&v=beta&t=qdw2xxM80VEEH30yxKzFs4I78J8C77w4oSRNqOz8wcQ" alt="logo" class="w-8 aspect-square" />
        </div>
        <div class='flex-3 w-full ml-2 mr-3 wrapper text-gray-500' >
            <div class="icon flex flex-row items-center Hdr_nav_search_box">
                <img class='mr-1' src={{URL::asset('assets/searchIcon.svg')}} width={30} height={30} alt="" /> <span class='ml-1'>Buscar</span>
            </div>
            <input class='w-full Hdr_nav_search_input bg-gray-100 rounded p-2' />
        </div>
        <div>
        <img class='mr-1 w-[24px] h-[24px]' src={{URL::asset('assets/menssageIcon.svg')}} width={24} height={24} alt="" />
        </div>
    </nav>
    <div id="container" class="h-full pb-9 w-full flex items-center flex-col" style="background-color: #E9E5DF;">

    </div>
    <div class='fixed flex flex-row bottom-0 w-full pl-1 pr-1 pt-2 pb-1 bg-white text-color-text-low-emphasis' id="btnsNav">
            
            
        </div>
    <script>
        const container = document.getElementById('container');
        const btnsNav = document.getElementById('btnsNav');
        const publicacion = (name, followers, date, content, media, likes, logo) => {
            const fecha = new Date(date);
            const fechaActual = new Date();
            const diff = parseInt((fechaActual.getTime() - fecha.getTime())/(1000*60*60*24));
            return `<div class="flex flex-col w-full mt-1 mb-2 bg-white md:w-[50%] sm:w-[75%]">
            <div class="flex flex-row pr-3 pl-3 pt-2" style="text-overflow: 'ellipsis'; overflow:'hidden'; white-space:'nowrap'">
                <img class="h-12 aspect-square" src="${logo}" alt="" />
                <div class="flex flex-col ml-2 text-color-text-low-emphasis">
                    <span class="text-black text-base" style="text-overflow: 'ellipsis'; overflow:'hidden'; white-space:'nowrap'">${name}</span>
                    <span class="text-xs text-gray-600">${followers} seguidores</span>
                    <span class="text-xs text-gray-600">${diff} dias </span>
                </div>
            </div>
            <div>
                <div  class="pl-3 pr-3 text-sm">
                <span>${content}</span>
                </div>
                <img class='w-full' src="${media}" alt="" />
            </div>
            <div class='pr-3 pl-3 pt-2 pb-2'>
                <div class=' flex flex-row text-xs'>
                <img alt="" data-reaction-type="LIKE" src={{URL::asset('assets/likeIMG.svg')}} class="lazy-loaded likeIcon mr-1 w-[16px] h-[16px]" />
                    ${likes}
                </div>
                <div class='w-full flex flex-row justify-between items-center'>
                    <button class='text-base text-gray-600 hover:bg-gray-100 p-2 flex flex-row items-center'>
                        <img class='mr-1  w-[24px] h-[24px]' src={{URL::asset('assets/like.svg')}} width={24} height={24} alt="" /> Recomendar
                    </button>
                    <button class='text-base text-gray-600 hover:bg-gray-100 p-2 flex flex-row items-center'>
                        <img class='mr-1 w-[24px] h-[24px]' src={{URL::asset('assets/comment.svg')}} width={24} height={24} alt="" />Comentar
                    </button>
                    <button class='text-base text-gray-600 hover:bg-gray-100 p-2 flex flex-row items-center'>
                        <img class='mr-1 w-[24px] h-[24px]' src={{URL::asset('assets/share.svg')}} width={24} height={24} alt="" />Compartir
                    </button>

                </div>
            </div>
        </div>`
        }
        const btnNavBar = (value, icon)=>{
            return `<button class='flex-1' onclick="changeView('${value}')" >
            <div class='flex flex-1 flex-col justify-center items-center text-gray-500'>
            <img class='mr-1 w-[24px]' src={{ URL::asset('assets/${icon}.svg')}} width={24} height={24} alt="" />
            <span class='text-xs'>${value}</span>
        </div>`
        }
        const changeView = (value) => {
            switch (value) {
                case 'Inicio':
                    container.innerHTML = publicacion('Universidad Nacional Autónoma de Honduras (UNAH)', 96174,'10/4/2023', 'El Programa de Educación Continúa en Salud de la Facultad de Ciencias Médicas de la UNAH presenta su oferta de cursos y diplomados en salud a iniciar en octubre.','https://media.licdn.com/dms/image/D4E22AQEOJ48IHnPiNg/feedshare-shrink_800/0/1696370114963?e=1700092800&v=beta&t=M-nAnIphL-ATlnOO2TuWl5SCuCyazd-oPKR7VQ4S7Jw', 47, 'https://media.licdn.com/dms/image/D4E0BAQGTRAHntOfgTg/company-logo_100_100/0/1667698674172?e=1704931200&v=beta&t=e6i4THvej2BCDFqHkx9VL4yeaZx3da023qnhyfMWS-M');
                    break;
                case 'Mi red':
                    container.innerHTML = 'Mi red';
                    break;
                case 'Empleos':
                    container.innerHTML = 'Empleos';
                    break;
                case 'Publicar':
                    container.innerHTML = 'Publicar';
                    break;
                case 'Notificaciones':
                    container.innerHTML = 'Notificaciones';
                    break;
                default:
                    break;
            }
        }
    </script>
    <script>
        changeView('Inicio');
        (()=>{
            btnsNav.innerHTML = btnNavBar('Inicio', 'homeIcon') + btnNavBar('Mi red', 'redIcon') + btnNavBar('Publicar', 'postIcon') + btnNavBar('Notificaciones', 'notiIcon')+ btnNavBar('Empleos', 'empleosIcon') ;
        })();
    </script>
</body>
</html>