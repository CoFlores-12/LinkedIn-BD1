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
    <div class="modal hidden flex flex-col fixed top-0 justify-center items-center left-0" id="modalComment">
        <div class="relative h-full w-full">
            <div class="fixed top-0 w-full bg-white pt-2 pl-3">
            <button id="full-page-header-back-button" onclick='toggleModalComment()' class="h-6 px-2 bg-color-background-container border-none" data-tracking-control-name="back" aria-label="volver" role="link" type="button">
          
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-6 h-6 text-color-icon lazy-loaded" data-supported-dps="24x24" fill="currentColor" focusable="false" aria-busy="false">
              <path d="M9 4l-4.87 7H22v2H4.13L9 20H6.56L1 12l5.56-8z"></path>
            </svg>
                </button>
            </div>
            <div id="commentsList" class="pt-10 pl-4 pr-4">
            <section class="comment flex grow-1 items-stretch leading-[16px]" data-is-comment-initialized="true">
        <div>
          <a href="https://www.linkedin.com/in/sandra-palacios-4a655470?trk=feed-detail_comments-list_comment_actor-image" data-tracking-control-name="feed-detail_comments-list_comment_actor-image" data-tracking-will-navigate="">
            
            <img class="inline-block relative rounded-[50%] w-8 h-8 lazy-loaded" data-ghost-classes="bg-color-entity-ghost-background" data-ghost-url="https://static.licdn.com/aero-v1/sc/h/9c8pery4andzj6ohjkjp54ma2" alt="Sandra Palacios" aria-busy="false" src="https://media.licdn.com/dms/image/C5603AQHJ3yDEbO1zZQ/profile-displayphoto-shrink_400_400/0/1517501506231?e=1703116800&amp;v=beta&amp;t=lwAV2iHYci-7XOeEU7Vs92akYghKyPgqAQLfB9n3X0o">
        
          </a>
        </div>
        <div class="w-full min-w-0">
          <div class="comment__body ml-0.5 mb-1 pt-1 pr-1.5 pb-1 pl-1.5 rounded-[8px] rounded-tl-none relative">
            <div class="comment__header flex flex-col">
                  <a class="text-sm link-styled no-underline leading-open comment__author truncate pr-6" href="https://www.linkedin.com/in/sandra-palacios-4a655470?trk=feed-detail_comments-list_comment_actor-name" data-tracking-control-name="feed-detail_comments-list_comment_actor-name" data-tracking-will-navigate="">
                    Sandra Palacios
                  </a>
                  <p class="!text-xs text-color-text-low-emphasis leading-[1.33333] mb-0.5 truncate comment__author-headline">Subgerente Regional de Inteligencia de la Experiencia</p>
              
        <span class="text-xs text-color-text-low-emphasis comment__duration-since absolute right-6 top-1 inline-block">
      1 semana
        </span>

            </div>
            
  <div class="attributed-text-segment-list__container relative mt-1 mb-1.5 babybear:mt-0 babybear:mb-0.5">
    <p class="attributed-text-segment-list__content text-color-text !text-sm whitespace-pre-wrap break-words
         comment__text babybear:mt-0.5" dir="ltr">Muy orgullosa de pertenecer al equipo de Experiencia del cliente, y seguir trabajando por mejorar la experiencia de nuestros clientes 💪 </p>
<!---->  </div>

            
<!---->      
<!---->          </div>
          
        <div class="comment__actions flex flex-row flex-wrap items-center ml-2" aria-label="Controles de comentarios">

              <button aria-label="Recomendado" class="comment__action inline-block font-sans text-xs text-color-text-low-emphasis cursor-pointer comment__reaction hidden " data-feed-action-category="UNREACT" data-feed-action="react" data-feed-control="feed-comment_like_toggle" data-feed-action-type="unlikeComment" data-reaction-type="LIKE">
                
  <div class="flex flex-row items-center text-color-link">
    <icon class="action-btn__icon w-2 mr-0.5 lazy-loaded" data-svg-class-name="action-btn__icon--svg" aria-hidden="true" aria-busy="false">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" focusable="false" class="action-btn__icon--svg lazy-loaded" aria-busy="false"><g fill="none" fill-rule="evenodd"><rect width="16" height="16" rx="8"></rect><circle fill="#1485BD" cx="8" cy="8" r="7"></circle><path d="M11.93 7.25h-.55c-.05 0-.15-.19-.4-.46-.37-.4-.78-.91-1.07-1.19a7.18 7.18 0 0 1-1.73-2.24c-.24-.51-.26-.74-.75-.74a.77.77 0 0 0-.67.81c0 .14.07.63.1.8a7.62 7.62 0 0 0 1 2.2h.54-4.28a.87.87 0 0 0-.88.94.91.91 0 0 0 .93.85h.16a.78.78 0 0 0-.76.8.81.81 0 0 0 .74.8.8.8 0 0 0 .33 1.42.79.79 0 0 0-.09.55.86.86 0 0 0 .85.63h2.29c.3 0 .599-.038.89-.11l1.42-.42h1.9c1.02-.04 1.29-4.64.03-4.64z" fill="#E6F7FF"></path><path d="M7.43 6.43H4.11a.88.88 0 0 0-.88 1 .91.91 0 0 0 .93.84h.16a.78.78 0 0 0-.76.8.83.83 0 0 0 .74.81.81.81 0 0 0-.31.63.82.82 0 0 0 .65.8.81.81 0 0 0-.09.56.86.86 0 0 0 .85.62h2.29c.3 0 .599-.038.89-.11l1.42-.47h1.9c1 0 1.27-4.64 0-4.64a5 5 0 0 1-.55 0c-.05 0-.15-.19-.4-.46-.37-.4-.78-.91-1.07-1.19a7.18 7.18 0 0 1-1.7-2.25 2 2 0 0 0-.32-.52.83.83 0 0 0-1.16.09 1.39 1.39 0 0 0-.25.38 1.49 1.49 0 0 0-.09.3 2.38 2.38 0 0 0 .07.84c.064.288.155.569.27.84.188.353.41.688.66 1a.18.18 0 0 1 .07.08" stroke="#004B7C" stroke-linecap="round" stroke-linejoin="round"></path></g></svg></icon>
    <span class="action-btn__button-text inline-block align-baseline">
      Recomendado
    </span>
  </div>

              </button>

              <button aria-label="Recomendar" class="comment__action inline-block font-sans text-xs text-color-text-low-emphasis cursor-pointer comment__reaction " data-tracking-control-name="feed-detail_comments-list_comment_react" data-feed-action="react" data-feed-control="feed-comment_like_toggle" data-feed-action-category="REACT" data-feed-action-type="likeComment">
                
  <div class="flex flex-row items-center ">
    <icon class="action-btn__icon w-2 mr-0.5 lazy-loaded" data-svg-class-name="action-btn__icon--svg" aria-hidden="true" aria-busy="false">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" focusable="false" class="action-btn__icon--svg lazy-loaded" aria-busy="false"><path d="M19.5 11l-3.9-3.9c-.8-.8-1.3-1.7-1.7-2.7l-.5-1.5C13 1.8 11.9 1 10.8 1 9.2 1 8 2.2 8 3.8v1.1c0 1 .2 1.9.5 2.8L8.9 9H4.1C3 9 2 10 2 11.1c0 .7.4 1.4.9 1.8-.6.4-.9 1-.9 1.7 0 .9.5 1.6 1.3 2-.2.3-.3.7-.3 1 0 1.1.9 2.1 2 2.1v.1C5 21 6 22 7.1 22h7.5c1.2 0 2.5-.3 3.6-.8l.3-.2H21V11h-1.5zm-.5 8h-1l-.7.4c-.8.4-1.8.6-2.7.6H7.7c-.4 0-.8-.3-1-.7l-.3-.9-.8-.4c-.4-.1-.7-.6-.6-1l.2-1-.8-.7c-.3-.4-.4-.9-.1-1.3l.7-1.1-.7-1.1c-.3-.4-.1-.8.3-.8h7l-1.3-3.9c-.2-.7-.3-1.5-.3-2.2V3.8c0-.5.3-.8.8-.8.3 0 .6.2.7.5L12 5c.4 1.3 1.2 2.5 2.2 3.5l4.5 4.5h.3v6z" fill="currentColor"></path></svg></icon>
    <span class="action-btn__button-text inline-block align-baseline">
      Recomendar
    </span>
  </div>

              </button>

                <span class="before:middot font-sans text-s text-color-text-low-emphasis"></span>
                <button aria-label="Responder" class="comment__action inline-block font-sans text-xs text-color-text-low-emphasis cursor-pointer comment__reply" data-feed-action="replyToComment" data-feed-control="comment" data-feed-action-category="expand" data-feed-action-type="replyToComment" data-tracking-control-name="feed-detail_comments-list_comment_reply">
                  
  <div class="flex flex-row items-center ">
    <icon class="action-btn__icon w-2 mr-0.5 lazy-loaded" data-svg-class-name="action-btn__icon--svg" aria-hidden="true" aria-busy="false">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" focusable="false" class="action-btn__icon--svg lazy-loaded" aria-busy="false"><path d="M7 9h10v1H7V9zm0 4h7v-1H7v1zm16-2c0 2.2-1 4.3-2.8 5.6L12 22v-4H8c-3.9 0-7-3.1-7-7s3.1-7 7-7h8c3.9 0 7 3.1 7 7zm-2 0c0-2.8-2.2-5-5-5H8c-2.8 0-5 2.2-5 5s2.2 5 5 5h6v2.3l5-3.3c1.3-.9 2-2.4 2-4z" fill="currentColor"></path></svg></icon>
    <span class="action-btn__button-text inline-block align-baseline">
      Responder
    </span>
  </div>

                </button>

<!---->              <span class="comment__reactions-count font-sans text-xs text-color-text-low-emphasis border-l-1 border-solid border-color-border-low-emphasis pl-1 mx-1 hidden">
                1&nbsp;reacción
              </span>
        </div>
      
        </div>
      </section>
            </div>
            <div class="absolute w-full bottom-0 left-0 flex flex-row items-center p-2">
                @if($user->photo == null)
                    <img class=" w-[24px] h-[24px] rounded-full mr-3" src="{{URL::asset('assets/profile.svg')}}" alt="">
                @else 
                    <img class=" w-[24px] h-[24px] rounded-full mr-3" src="{{$user->photo}}" alt="">
                @endif
                <input class="flex-1" type="text" placeholder="Añade tu comentario">
                <button class="btn-sm btn-pu btn-tertiary-emphasis comment-box__post-btn" >Publicar</button>
            </div>
        </div>
    </div>
    <div class="modal hidden  h-full flex flex-col fixed top-0 left-0" id="modalShare">
        <div class="flex pt-2 pl-3 pr-3 felx-row justify-between items-center">
                <img onclick="toggleModalShare()" class="w-[24px] h-[24px]" src={{URL::asset('assets/xIcon.svg')}} width="100px" alt="">
                <span class='title flex-1'>Compartir</span>
                <button class="btn-sm post-button btn-pu" 
                onclick="createPost()"
                >Publicar</button>
        </div>
        <div class=" pl-3 pr-3 ">
           <div class="flex flex-row mt-8">
               @if($user->photo == null)
                 <img id="imgShare" class="inline-block relative rounded-[50%] w-12 h-12 lazy-loaded mr-3 ml-1" src="{{URL::asset('assets/profile.svg')}}" width="100px" alt="">
                @else 
                <img id="imgShare" class="inline-block relative rounded-[50%] w-12 h-12 lazy-loaded mr-3 ml-1" src="{{$user->photo}}" width="100px" alt="">
                
            @endif
            <span id="nameShare" class="text-sm font-medium leading-open text-color-text line-clamp-1 entity-name">{{$user->name}}</span>
           </div>
           <input id="contentInput" class="w-full h-10 mb-10" placeholder="Comparte tus ideas. Añade fotos o hashtags." type="textarea" name="" id="">
        </div>
        <div class="flex border-t-1 border-solid border-color-divider share-actions flex-col">
            <div class="relative hidden" id="prevCont">
            <img onclick="deleteImage()" class="w-[24px] h-[24px] absolute r-3 t-2" src={{URL::asset('assets/xIcon.svg')}} width="100px" alt="">
                <img src="#" class="hidden" id="prevImage" alt="">
            </div>
  <span data-action="add-image" class="add-image  pl-3 pr-3 mt-0.5 items-center justify-center text-color-text-secondary modal-action" id="image-upload-label">
    <label for="media" class="rounded-full image-upload-btn">
     <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor" focusable="false" class="lazy-loaded text-inherit" aria-busy="false">
  <path d="M12 17C14.2091 17 16 15.2091 16 13C16 10.7909 14.2091 9 12 9C9.79086 9 8 10.7909 8 13C8 15.2091 9.79086 17 12 17Z"></path>
  <path d="M19 6H17.7L16.5 3H7.5L6.3 6H5C3.3 6 2 7.3 2 9V20H22V9C22 7.3 20.7 6 19 6ZM12 18C9.2 18 7 15.8 7 13C7 10.2 9.2 8 12 8C14.8 8 17 10.2 17 13C17 15.8 14.8 18 12 18Z"></path>
</svg>
    </label>
        <input id="media" class="" accept=".png,.jpg,.jpeg,.mp4,.pdf" type="file">  
  </span>

          </div>
    </div>
    <nav class="flex flex-row items-center p-3 sticky">
        <div class='rounded-full overflow-hidden'>
            <a id="profileimg" href="/in/{{$user->id}}">
                @if($user->photo == null)
                <img src="{{URL::asset('assets/profile.svg')}}" alt="logo" class="w-8 aspect-square" />
            
            @else 
            <img src="{{$user->photo}}" alt="logo" class="w-8 aspect-square" />
                
            @endif
            </a>
        </div>
        <div class='flex-3 w-full ml-2 mr-3 wrapper text-gray-500' >
            <div class="icon flex flex-row items-center Hdr_nav_search_box">
                <img class='mr-1' src={{URL::asset('assets/searchIcon.svg')}} width={30} height={30} alt="" /> <span class='ml-1'>Buscar</span>
            </div>
            <input class='w-full Hdr_nav_search_input bg-gray-100 rounded p-2' />
        </div>
        <div>
        <button  onclick=message('Cesar')> <img class='mr-1 w-[24px] h-[24px]' src={{URL::asset('assets/menssageIcon.svg')}} width={24} height={24} alt="" /></button>
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

const publicacion = (name, followers, date, content, media, likes, logo, id, idPost) => {
    const fecha = new Date(date);
    const fechaActual = new Date();
    const diff = parseInt((fechaActual.getTime() - fecha.getTime())/(1000*60*60*24));
    return `<div class="flex flex-col w-full mt-1 mb-2 bg-white md:w-[50%] sm:w-[75%]">
    <a href="/feed/${idPOst}">
    <div class="flex flex-row pr-3 pl-3 pt-2" style="text-overflow: 'ellipsis'; overflow:'hidden'; white-space:'nowrap'">
        <img class="h-12 aspect-square" src="${logo}" alt="" />
        <div class="flex flex-col ml-2 text-color-text-low-emphasis">
        <a href="/in/${id}">
            <span class="text-black text-base" style="text-overflow: 'ellipsis'; overflow:'hidden'; white-space:'nowrap'">${name}</span>
        </a>
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
            <button onclick="toggleModalComment(${idPost})" class='text-base text-gray-600 hover:bg-gray-100 p-2 flex flex-row items-center'>
                <img class='mr-1 w-[24px] h-[24px]' src='assets/comment.svg' width={24} height={24} alt="" />Comentar
            </button>
            <button class='text-base text-gray-600 hover:bg-gray-100 p-2 flex flex-row items-center'>
                <img class='mr-1 w-[24px] h-[24px]' src='assets/share.svg' width={24} height={24} alt="" />Compartir
            </button>

        </div>
    </div>
    </a>
</div>`
}
const notification = (date,text) => {
            const fecha = new Date(date);
            const fechaActual = new Date();
            const diff = parseInt((fechaActual.getTime() - fecha.getTime())/(1000*60*60*24));
        return ` <div class='containerGroupa'>
        </div>
            <div class='containerNoti'>
            <div class='notifications'>
                <div class='imagenNoti'>
                <img width="48" src="https://media.licdn.com/media/AAYQAgQJAAgAAQAAAAAAADEfOQH9O48jQmKNtryiizLAHg.png" loading="lazy" height="48" alt="" id="ember58" class="ivm-view-attr__img--centered ivm-view-attr__img   evi-image lazy-image ember-view">
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
                <img width="48" src="https://media.licdn.com/media/AAYQAgQJAAgAAQAAAAAAADEfOQH9O48jQmKNtryiizLAHg.png" loading="lazy" height="48" alt="" id="ember58" class="ivm-view-attr__img--centered ivm-view-attr__img   evi-image lazy-image ember-view">
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
                <img width="48" src="https://media.licdn.com/media/AAYQAgQJAAgAAQAAAAAAADEfOQH9O48jQmKNtryiizLAHg.png" loading="lazy" height="48" alt="" id="ember58" class="ivm-view-attr__img--centered ivm-view-attr__img   evi-image lazy-image ember-view">
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
      const message=(user)=>{
          container.innerHTML=`<div class="containerMessages">
        <div class="message">
            <div class="imageMessage">
                <img src="https://media.licdn.com/dms/image/C4D03AQHFot31JK1Rhw/profile-displayphoto-shrink_100_100/0/1578354888650?e=1703116800&amp;v=beta&amp;t=3a3ifGcxQxPjDcLMmcMbEkvYstgD2Vh6Q_kxz5kT1Eg" loading="lazy" alt="Franklin Tavarez" id="ember289" class="evi-image rounded-image  lazy-image msg-facepile-grid__img msg-facepile-grid__img--person ember-view">
            </div>
            <div class="infoMessage">
                <div class="authorMessage"><span>
                    Franklin Tavarez
                </span></div>
                <div class="textMessage"><p>
                    ¡Hola, ${user}!
                    Me llamo Franklin y formo parte del equipo de LinkedIn Premium. ¡Gracias por tu confianza en LinkedIn! Nos gustaría ofrecerte un mes de prueba gratis para Premium.
                </p>
            </div>
            </div>
            <div class="hourMessage"><span>10 oct</span>
            </div>
        </div>
        <div class="message">
            <div class="imageMessage">
                <img src="https://media.licdn.com/dms/image/C4D03AQHFot31JK1Rhw/profile-displayphoto-shrink_100_100/0/1578354888650?e=1703116800&amp;v=beta&amp;t=3a3ifGcxQxPjDcLMmcMbEkvYstgD2Vh6Q_kxz5kT1Eg" loading="lazy" alt="Franklin Tavarez" id="ember289" class="evi-image rounded-image  lazy-image msg-facepile-grid__img msg-facepile-grid__img--person ember-view">
            </div>
            <div class="infoMessage">
                <div class="authorMessage"><span>
                    Franklin Tavarez
                </span></div>
                <div class="textMessage"><p>
                    ¡Hola, Josue!
                    Me llamo Franklin y formo parte del equipo de LinkedIn Premium. ¡Gracias por tu confianza en LinkedIn! Nos gustaría ofrecerte un mes de prueba gratis para Premium.
                </p>
            </div>
            </div>
            <div class="hourMessage"><span>10 oct</span>
            </div>
        </div>
    </div>`;
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
    const container = document.getElementById('container');
    container.classList.toggle('hidden');
}

const toggleModalComment = () => {
    const modal = document.getElementById('modalComment');
    modal.classList.toggle('hidden');
    const container = document.getElementById('container');
    container.classList.toggle('hidden');
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




const imgInp = document.getElementById('media')
        const blah = document.getElementById('prevImage')
        const blahcon = document.getElementById('prevCont')
        imgInp.onchange = evt => {
            const [file] = imgInp.files
            if (file) {
                blah.classList.remove('hidden');
                blahcon.classList.remove('hidden');
                blah.src = URL.createObjectURL(file);
            }
        }
        const deleteImage = () => {
            imgInp.files = null;
            blah.classList.add('hidden');
            blahcon.classList.add('hidden');
            blah.src = '';
        }
const createPost = ()=>{
    const content = document.getElementById('contentInput');
    let formData = new FormData();
      formData.append('content', content.value);
      formData.append('media', imgInp.files[0]);
      const options = {method: 'POST', body: formData};
    fetch('/posts/crear', options)
            .then((response)=>{
                if (response.status != 200) {
                    alert(response)
                }else{
                    toggleModalShare();
                }
            })
            .catch(err => console.log(err));
}
(()=>{
    //init navbar
    btnsNav.innerHTML = btnNavBar('Inicio', 'homeIcon') + btnNavBar('Mi red', 'redIcon') + btnNavBar('Publicar', 'postIcon') + btnNavBar('Notificaciones', 'notiIcon')+ btnNavBar('Empleos', 'empleosIcon') ;

            //callback cascade
            fetch('/posts', {method: 'GET'})
            .then(response => response.json())
            .then(response => {
                response.forEach(userPost => {
                    postContainer.innerHTML += publicacion(userPost.name, userPost.followers, userPost.date, userPost.content, userPost.media, userPost.likes, userPost.photo, userPost.user_id, userPost.id);
                });
                document.getElementById('modalLoad').style.display = 'none';
                //TODO: get jobs from api
    
                //TODO: get notifications from api
                notiContainer.innerHTML =notification('https://media.licdn.com/dms/image/D4E0BAQGTRAHntOfgTg/company-logo_100_100/0/1667698674172?e=1704931200&v=beta&t=e6i4THvej2BCDFqHkx9VL4yeaZx3da023qnhyfMWS-M','10/2/2023', 'En el trabajo no debes darlo todo, conoce la regla del 85%' );
    
                //TODO: get network from api
            })
            .catch(err => console.log(err));


        

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
