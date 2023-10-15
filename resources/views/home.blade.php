<!DOCTYPE html>
<html lang="en">
<head>
<script>
        function getCookie(cname) {
            let name = cname + "=";
            let decodedCookie = decodeURIComponent(document.cookie);
            let ca = decodedCookie.split(';');
            for(let i = 0; i <ca.length; i++) {
                let c = ca[i];
                while (c.charAt(0) == ' ') {
                    c = c.substring(1);
                }
                if (c.indexOf(name) == 0) {
                    return c.substring(name.length, c.length);
                }
            }
            return "";
        }
        const token = getCookie('token');
        if (token === '') {
            window.location.href = '/login'
        }
    </script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LinkedIn | Home</title>
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <link rel="stylesheet" href="{{ URL::asset('css/home.css')}}">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/1e8824e8c2.js" crossorigin="anonymous"></script>
    
</head>
<body>
    <div class="modal flex flex-col fixed top-0 justify-center items-center left-0" id="modalLoad">
        <img src="assets/logo.svg" width="100px" alt="">
        <div class="loader"></div>
    </div>
    <div class="modal hidden  h-full flex flex-col fixed top-0 left-0" id="modalShare">
        <div class="flex pt-2 pl-3 pr-3 felx-row justify-between items-center">
                <img onclick="toggleModalShare()" class="w-[24px] h-[24px]" src={{URL::asset('assets/xIcon.svg')}} width="100px" alt="">
                <span class='title flex-1'>Compartir</span>
                <button class="btn-sm btn-tertiary post-button " data-tracking-control-name="post" data-feed-action-category="SHARE" data-feed-action-type="submitReshare" data-feed-control="post" disabled="disabled" aria-disabled="true">Publicar</button>
        </div>
        <div class=" pl-3 pr-3 ">
           <div class="flex flex-row mt-8">
           <img id="imgShare" class="inline-block relative rounded-[50%] w-12 h-12 lazy-loaded mr-3 ml-1" src="https://media.licdn.com/dms/image/D5635AQGXW0U7XhrOLA/profile-framedphoto-shrink_400_400/0/1660002666757?e=1697839200&v=beta&t=mUY_Bags3Q813Xs3PVQQFZWkiTWZXMcoPk65yGiX4ng" width="100px" alt="">
            <span id="nameShare" class="text-sm font-medium leading-open text-color-text line-clamp-1 entity-name">Cesar Flores</span>
           </div>
           <input id="contentPost" class="w-full h-10 mb-10" placeholder="Comparte tus ideas. Añade fotos o hashtags." type="textarea" name="" id="">
        </div>
        <div class="flex border-t-1 border-solid border-color-divider mt-1 share-actions">
            
  <span data-action="add-image" class="add-image  pl-3 pr-3 mt-0.5 items-center justify-center text-color-text-secondary modal-action" id="image-upload-label">
    <button class="rounded-full p-1.5 image-upload-btn" data-tracking-control-name="add-image">
      <icon class="w-3 h-3 text-inherit lazy-loaded" aria-hidden="true" aria-busy="false"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor" focusable="false" class="lazy-loaded" aria-busy="false">
  <path d="M12 17C14.2091 17 16 15.2091 16 13C16 10.7909 14.2091 9 12 9C9.79086 9 8 10.7909 8 13C8 15.2091 9.79086 17 12 17Z"></path>
  <path d="M19 6H17.7L16.5 3H7.5L6.3 6H5C3.3 6 2 7.3 2 9V20H22V9C22 7.3 20.7 6 19 6ZM12 18C9.2 18 7 15.8 7 13C7 10.2 9.2 8 12 8C14.8 8 17 10.2 17 13C17 15.8 14.8 18 12 18Z"></path>
</svg></icon>
      <span class="sr-only">Añadir foto</span>
    </button>
    
              <input multiple="" id="image-upload" class="hidden" accept="image/*" type="file">
            
  </span>

            
  <span data-action="add-mentions" class="add-mention modal-action" data-a11y-text-after-activation="Mención activada, te mostraremos sugerencias al escribir.">
    <button class="rounded-full p-1.5 " data-tracking-control-name="add-mentions">
      <icon class="w-3 h-3 text-inherit lazy-loaded" aria-hidden="true" aria-busy="false"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor" focusable="false" class="lazy-loaded" aria-busy="false">
  <path d="M12 2C6.5 2 2 6 2 12C2 18 6.5 22 12 22C14.3 22 16.1 21.4 17 20.8V18.6C16 19.2 14.3 19.9 12 19.9C7.6 19.9 4 16.8 4 11.9C4 7 7.6 3.9 12 3.9C17.1 3.9 20 6.8 20 11.7C20 13.6 19.4 14.9 18.4 14.9C17.5 14.9 17 14.3 17 13.3V7.2H15V8C14.2 7.4 13.1 7 12 7C9.2 7 7 9.2 7 12C7 14.8 9.2 17 12 17C13.4 17 14.7 16.4 15.6 15.5C16.1 16.4 17.1 17 18.4 17C20.1 17 22 15.5 22 11.8C22 5.8 18.2 2 12 2ZM12 15C10.3 15 9 13.7 9 12C9 10.3 10.3 9 12 9C13.7 9 15 10.3 15 12C15 13.7 13.7 15 12 15Z"></path>
</svg></icon>
      <span class="sr-only">Añadir una mención</span>
    </button>
    
  </span>

            
  <span data-action="add-hashtag-v2" class="add-hashtag modal-action" data-a11y-text-after-activation="Hashtag activado, te mostraremos sugerencias al escribir.">
    <button class="rounded-full p-1.5 " data-tracking-control-name="add-hashtag-v2">
      <icon class="w-3 h-3 text-inherit lazy-loaded" aria-hidden="true" aria-busy="false"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor" focusable="false" class="lazy-loaded" aria-busy="false">
  <path d="M21 10V8H16.4L17 3H15L14.4 8H10.4L11 3H9L8.4 8H3V10H8.2L7.8 14H3V16H7.6L7 21H9L9.6 16H13.6L13 21H15L15.6 16H21V14H15.8L16.2 10H21ZM13.8 14H9.8L10.2 10H14.2L13.8 14Z"></path>
</svg></icon>
      <span class="sr-only">Añadir un hashtag</span>
    </button>
    
  </span>

          </div>
    </div>
    <nav class="flex flex-row items-center p-3 sticky">
        <div class='rounded-full overflow-hidden'>
            <a id="profileimg" href="/in/">
            <img src="" alt="logo" class="w-8 aspect-square" />
            </a>
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
        <div id="postContainer" class="h-full hidden w-full flex items-center flex-col" style="background-color: #E9E5DF;"></div>
        <div id="redContainer" class="h-full hidden w-full flex items-center flex-col" style="background-color: #E9E5DF;"></div>
        <div id="notiContainer" class="h-full hidden w-full flex items-center flex-col" style="background-color: #E9E5DF;"></div>
        <div id="jobsContainer" class="h-full hidden w-full flex items-center flex-col" style="background-color: #FFF;">
            <div>Empleos para ti</div>
            <div id="listJobs" class="w-full">
               <a href="/job/" class="jobItem p-2">
                <div class="flex flex-row">
                        <img width="70" height="70" src="https://media.licdn.com/dms/image/D4D0BAQHrYseFDoK7JQ/company-logo_100_100/0/1688418672408/clevertech_logo?e=1705536000&v=beta&t=BCgdXYPLyX_vuiyWMWDAzxjj2H1z1Ekfa4S3J5kMg34" class="mr-2 ml-2" alt="">
                        <div>
                            <h1 class="titleJob">name</h1>
                            <h3 class="mediumJob">puesto</h3>
                            <h6 class="infoJob">
                                <span>location</span>
                                <span class="dot-separator" aria-hidden="true"></span>
                                <span>date</span>
                            </h6>
                        </div>

                    </div>
               </a>
               
            </div>
        </div>
    </div>
    <div class='fixed flex flex-row bottom-0 w-full pl-1 pr-1 pt-2 pb-1 bg-white text-color-text-low-emphasis' id="btnsNav">
            
            
        </div>

  <script>
    const container = document.getElementById('container');
    const postContainer = document.getElementById('postContainer');
    const redContainer = document.getElementById('redContainer');
    const notiContainer = document.getElementById('notiContainer');
    const jobsContainer = document.getElementById('jobsContainer');
    const btnsNav = document.getElementById('btnsNav');

const job = (title, farm, location, date, id, logo)=>{
    return `<a href="/job/${id}" class="jobItem p-2">
                <div class="flex flex-row">
                        <img width="70" height="70" src="${logo}" class="mr-2 ml-2" alt="">
                        <div>
                            <h1 class="titleJob">${title}</h1>
                            <h3 class="mediumJob">${farm}</h3>
                            <h6 class="infoJob">
                                <span>${location}</span>
                                <span class="dot-separator" aria-hidden="true"></span>
                                <span>${date}</span>
                            </h6>
                        </div>

                    </div>
               </a>`
}

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
        <img alt="" data-reaction-type="LIKE" src='assets/likeIMG.svg' class="lazy-loaded likeIcon mr-1 w-[16px] h-[16px]" />
            ${likes}
        </div>
        <div class='w-full flex flex-row justify-between items-center'>
            <button class='text-base text-gray-600 hover:bg-gray-100 p-2 flex flex-row items-center'>
                <img class='mr-1  w-[24px] h-[24px]' src='assets/like.svg' width={24} height={24} alt="" /> Recomendar
            </button>
            <button class='text-base text-gray-600 hover:bg-gray-100 p-2 flex flex-row items-center'>
                <img class='mr-1 w-[24px] h-[24px]' src='assets/comment.svg' width={24} height={24} alt="" />Comentar
            </button>
            <button class='text-base text-gray-600 hover:bg-gray-100 p-2 flex flex-row items-center'>
                <img class='mr-1 w-[24px] h-[24px]' src='assets/share.svg' width={24} height={24} alt="" />Compartir
            </button>

        </div>
    </div>
</div>`
}
const notification = (logo,date,text) => {
            const fecha = new Date(date);
            const fechaActual = new Date();
            const diff = parseInt((fechaActual.getTime() - fecha.getTime())/(1000*60*60*24));
        return ` <div class='containerGroupa'>
        </div>
            <div class='containerNoti'>
            <div class='notifications'>
                <div class='imagenNoti'>
                <img class="h-12 aspect-square" src="${logo}" alt="" />
                </div>
                <div  class="pl-3 pr-3 text-sm">
                <span>${text}</span>
                </div>
                <div class='dateOptions'>
                <span class="text-xs text-gray-600">${diff} dias </span>
                    <i class="fa-solid fa-ellipsis"></i>
                </div>
            </div>
            <div class='notifications'>
                <div class='imagenNoti'>
                <img class="h-12 aspect-square" src="${logo}" alt="" />
                </div>
                <div  class="pl-3 pr-3 text-sm">
                <span>${text}</span>
                </div>
                <div class='dateOptions'>
                <span class="text-xs text-gray-600">${diff} dias </span>
                    <i class="fa-solid fa-ellipsis"></i>
                </div>
            </div>
            <div class='notifications'>
                <div class='imagenNoti'>
                <img class="h-12 aspect-square" src="${logo}" alt="" />
                </div>
                <div  class="pl-3 pr-3 text-sm">
                <span>${text}</span>
                </div>
                <div class='dateOptions'>
                <span class="text-xs text-gray-600">${diff} dias </span>
                    <i class="fa-solid fa-ellipsis"></i>
                </div>
            </div>
        </div>`
        }

const changeView = (value) => {
    switch (value) {
        case 'Inicio':
            postContainer.classList.remove('hidden');
            redContainer.classList.add('hidden');
            notiContainer.classList.add('hidden');
            jobsContainer.classList.add('hidden');
            break;
        case 'Mi red':
            postContainer.classList.add('hidden');
            redContainer.classList.remove('hidden');
            notiContainer.classList.add('hidden');
            jobsContainer.classList.add('hidden');
            break;
        case 'Empleos':
            postContainer.classList.add('hidden');
            redContainer.classList.add('hidden');
            notiContainer.classList.add('hidden');
            jobsContainer.classList.remove('hidden');
            break;
        case 'Publicar':
            toggleModalShare();
            break;
        case 'Notificaciones':
            postContainer.classList.add('hidden');
            redContainer.classList.add('hidden');
            notiContainer.classList.remove('hidden');
            jobsContainer.classList.add('hidden');

            break;
        default:
            break;
    }
}

const toggleModalShare = () => {
    const modal = document.getElementById('modalShare');
    modal.classList.toggle('hidden');
}
//init view
changeView('Inicio');
const btnNavBar = (value, icon)=>{
    return `<button class='flex-1' onclick="changeView('${value}')" >
    <div class='flex flex-1 flex-col justify-center items-center text-gray-500'>
    <img class='mr-1 w-[24px]' src="assets/${icon}.svg" width={24} height={24} alt="" />
    <span class='text-xs'>${value}</span>
</div>`
}

(()=>{
    //init navbar
    btnsNav.innerHTML = btnNavBar('Inicio', 'homeIcon') + btnNavBar('Mi red', 'redIcon') + btnNavBar('Publicar', 'postIcon') + btnNavBar('Notificaciones', 'notiIcon')+ btnNavBar('Empleos', 'empleosIcon') ;

    //get user info
    fetch('/api/me', {method: 'GET'})
        .then(response => response.json())
        .then(response => {
            document.getElementById('profileimg').href = `/in/${response.id}`;
            document.getElementById('nameShare').innerHTML = response.name;
            document.getElementById('imgShare').src = response.photo;
            document.getElementById('profileimg').innerHTML = `<img src="${response.photo}" alt="logo" class="w-8 aspect-square" />`;

            //callback cascade
            fetch('/api/posts', {method: 'GET'})
            .then(response => response.json())
            .then(response => {
                console.log(response);
                response.forEach(userPost => {
                    postContainer.innerHTML += publicacion(userPost.name, userPost.followers, userPost.date, userPost.content, userPost.media, userPost.likes, userPost.photo);
                });
                document.getElementById('modalLoad').style.display = 'none';
                //TODO: get jobs from api
    
                //TODO: get notifications from api
                notiContainer.innerHTML =notification('https://media.licdn.com/dms/image/D4E0BAQGTRAHntOfgTg/company-logo_100_100/0/1667698674172?e=1704931200&v=beta&t=e6i4THvej2BCDFqHkx9VL4yeaZx3da023qnhyfMWS-M','10/2/2023', 'En el trabajo no debes darlo todo, conoce la regla del 85%' );
    
                //TODO: get network from api
            })
            .catch(err => console.log(err));


        })
        .catch(err => window.location.href = '/login');

    /*
        fetch('/api/posts', {method: 'GET'})
            .then(response => response.json())
            .then(response => {
                response.forEach(element => {
                    container.innerHTML += publicacion(element.name, element.followers, element.date, element.content, element.media, element.likes, element.logo);
                });
            })
            .catch(err => window.location.href = '/login');
    */
})();
  </script>
</body>
</html>
