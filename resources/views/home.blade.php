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
    <script src="{{ URL::asset('js/moment.min.js')}}"></script>
</head>
<body>

<!-- loading modal -->
    <div class="modal flex flex-col fixed top-0 justify-center items-center left-0" id="modalLoad">
        <img src="assets/logo.svg" width="100px" alt="">
        <div class="loader"></div>
    </div>

<!-- comment modal -->
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
            
            </div>
            <div class="absolute w-full bottom-0 left-0 flex flex-row items-center p-2">
                @if($user->photo == null)
                    <img class=" w-[24px] h-[24px] rounded-full mr-3" src="{{URL::asset('assets/profile.svg')}}" alt="">
                @else 
                    <img class=" w-[24px] h-[24px] rounded-full mr-3" src="{{URL::asset('storage/'.$user->photo)}}" alt="">
                @endif
                <input class="flex-1" type="text" id="commentInput" placeholder="Añade tu comentario">
                <button onclick="publicarComment()" class="btn-sm btn-pu btn-tertiary-emphasis comment-box__post-btn" >Publicar</button>
            </div>
        </div>
    </div>
<!-- comment finish modal -->

<!-- share modal -->
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
                <img id="imgShare" class="inline-block relative rounded-[50%] w-12 h-12 lazy-loaded mr-3 ml-1" src="{{URL::asset('storage/'.$user->photo)}}" width="100px" alt="">
                
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
<!-- share finish modal -->

<!-- msg  modal -->
<div class="modal hidden fixed top-0 left-0" id="modalMsg">
    <div class="fixed top-0 w-full bg-white pt-2 pl-3 flex items-center">
            <button id="full-page-header-back-button" onclick='toggleModalMsg()' class="h-6 px-2 bg-color-background-container border-none" data-tracking-control-name="back" aria-label="volver" role="link" type="button">
          
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-6 h-6 text-color-icon lazy-loaded" data-supported-dps="24x24" fill="currentColor" focusable="false" aria-busy="false">
                    <path d="M9 4l-4.87 7H22v2H4.13L9 20H6.56L1 12l5.56-8z"></path>
                </svg>
            </button>
            <span class="py-[10px] px-2 grow text-lg self-center text-color-text font-bold leading-open text-ellipsis overflow-hidden whitespace-nowrap ">Mensajes</span>
            <div id="header-action">
                <a class="block px-2 !text-color-icon box-content" href="/messaging/compose/" data-tracking-control-name="compose" data-tracking-will-navigate="">
                    <svg viewBox="0 0 24 24" data-supported-dps="24x24" fill="currentColor" class="iconMsg">
                        <path d="M19 12h2v6a3 3 0 01-3 3H6a3 3 0 01-3-3V6a3 3 0 013-3h6v2H6a1 1 0 00-1 1v12a1 1 0 001 1h12a1 1 0 001-1zm4-8a2.91 2.91 0 01-.87 2l-8.94 9L7 17l2-6.14 9-9A3 3 0 0123 4zm-4 2.35L17.64 5l-7.22 7.22 1.35 1.34z"></path>
                    </svg>
                </a>
            </div>
    </div>
    <div id="chats" class="flex flex-col pt-[56px]">

    </div>
</div>
<!-- msg finish modal -->

<!-- chat  modal -->
<div class="modal hidden fixed top-0 left-0" id="modalChat">
    <div class="fixed top-0 w-full bg-white pt-2 pl-3 flex items-center">
            <button id="full-page-header-back-button" onclick='closeChat()' class="h-6 px-2 bg-color-background-container border-none" data-tracking-control-name="back" aria-label="volver" role="link" type="button">
          
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-6 h-6 text-color-icon lazy-loaded" data-supported-dps="24x24" fill="currentColor" focusable="false" aria-busy="false">
                    <path d="M9 4l-4.87 7H22v2H4.13L9 20H6.56L1 12l5.56-8z"></path>
                </svg>
            </button>
            <span class="py-[10px] px-2 grow text-lg self-center text-color-text font-bold leading-open text-ellipsis overflow-hidden whitespace-nowrap " id="chatName"></span>
            
    </div>
    <div id="chatBody" class="flex flex-col pt-[56px]">
        
    </div>
    <div style="border-top: 1px solid #eee;" class="absolute w-full bottom-0 left-0 flex flex-row items-center p-2">
        <input class="flex-1" type="text" id="msgInput" placeholder="Escribe algo">
        <button onclick="enviarmsg()" class="btn-sm btn-pu btn-tertiary-emphasis comment-box__post-btn" >Enviar</button>
    </div>
</div>
<!-- chat finish modal -->

<!-- main page -->
    <nav class="flex flex-row items-center p-3 sticky">
        <div class='rounded-full overflow-hidden'>
            <a id="profileimg" href="/in/{{$user->id}}">
                @if($user->photo == null)
                <img src="{{URL::asset('assets/profile.svg')}}" alt="logo" class="w-8 aspect-square" />
            
            @else 
            <img src="{{URL::asset('storage/'.$user->photo)}}" alt="logo" class="w-8 aspect-square" />
                
            @endif
            </a>
        </div>
        <div class='flex-3 w-full ml-2 mr-3 wrapper text-gray-500' >
            
            <input id="busquedaInp" class='w-full Hdr_nav_search_input bg-gray-100 rounded p-2' placeholder="Buscar" />
        </div>
        <div>
        <button onclick=toggleModalMsg()> <img class='mr-1 w-[24px] h-[24px]' src={{URL::asset('assets/menssageIcon.svg')}} width={24} height={24} alt="" /></button>
        </div>
    </nav>
    <div id="container" class="h-full pb-9 w-full flex items-center flex-col" style="background-color: #E9E5DF;">
        <div id="postContainer" class="h-full hidden w-full flex items-center flex-col" style="background-color: #E9E5DF;"></div>
        <div id="redContainer" class="h-full hidden w-full flex items-center flex-col" style="background-color: #E9E5DF;">
            <div id="invitaciones" class="w-full">
                No hay invitaciones pendientes
            </div>
            <div id="sugerencias" class="w-full">
            </div>
    </div>
        <div id="notiContainer" class="h-full hidden w-full flex items-center flex-col" style="background-color: #E9E5DF;">
            
    </div>
    <div id="jobsContainer" class="h-full hidden w-full flex items-center flex-col" >
        <a class="w-full bg-white myapplications" href="/jobs/myApplications">
            ver mis solicitudes
        </a>
        <div id="listJobs" style="background-color: #FFF;" class="w-full">
            <div class="center">Empleos para ti</div>
               
               
            </div>
        </div>
    </div>
    <div class='fixed flex flex-row bottom-0 w-full pl-1 pr-1 pt-2 pb-1 bg-white text-color-text-low-emphasis' id="btnsNav">
            
            
        </div>

  <script src="/js/home.js"></script>
</body>
</html>
