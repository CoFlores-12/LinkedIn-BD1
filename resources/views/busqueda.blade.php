<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$busqueda}} | LinkedIn</title>
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <link rel="stylesheet" href="{{ URL::asset('css/busqueda.css')}}">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/1e8824e8c2.js" crossorigin="anonymous"></script>
</head>
<body>
    <main class="flex  flex-col items-center w-full">
        <div id="users" class="flex collapsableUsers flex-col w-[95%] md:w-[70%] p-3 bg-white">
            <center><h1>Usuarios</h1></center>
            @foreach($users as $user)
                <a href="/in/{{$user->id}}" class="user flex flex-row items-center justify-between">
                    <img src="/storage/{{$user->photo}}" width="48px" alt="">
                    <div class="infoUser ml-2">
                        <span class="nameUser">{{$user->name}}</span><br>
                        <span class="catUser">{{$user->categoryname}}</span>
                    </div>
                </a>
            @endforeach
        </div>
        <button class="w-[95%] md:w-[70%] p-3 bg-white" onclick="document.getElementById('users').classList.toggle('collapsableUsers')">
            Mostrar Mas
        </button>
        <div id="posts" class="collapsablePosts flex items-center flex-col w-[95%] md:w-[70%] mt-[20px]">
            <center><h1>Publicaciones</h1></center>
            @foreach($posts as $post)
            <div class="flex flex-col w-full mt-1 mb-2 bg-white ">
    <a href="/feed/{{$post->id}}">
    <div class="flex flex-row pr-3 pl-3 pt-2" style="text-overflow: 'ellipsis'; overflow:'hidden'; white-space:'nowrap'">
        <img class="h-12 aspect-square" src="/storage/{{$post->photo}}" alt="" />
        <div class="flex flex-col ml-2 text-color-text-low-emphasis">
        <a href="/in/${id}">
            <span class="text-black text-base" style="text-overflow: 'ellipsis'; overflow:'hidden'; white-space:'nowrap'">{{$post->name}}</span>
        </a>
            <span class="text-xs text-gray-600">{{$post->followers}} seguidores</span>
            <span class="text-xs text-gray-600">${diff} dias </span>
        </div>
    </div>
    <div>
        <div  class="pl-3 pr-3 text-sm">
        <span>{{$post->content}}</span>
        </div>
        @if($post->type == 'image/png' || $post->type == 'image/jpg')
                <img src="{{ URL::asset('storage/'.$post->media)}}">
            @endif
            @if($post->type == 'video/mp4')
                <video style="width=100%" controls>
                  <source src="{{ URL::asset('storage/'.$post->media)}}" type="video/mp4">
                  Your browser does not support the video tag.
                </video>
            @endif
            @if($post->type == 'application/pdf')
              <object data="{{ URL::asset('storage/'.$post->media)}}" type="application/pdf" width="100%" height="100%">
                <p>Alternative text - include a link <a href="{{ URL::asset('storage/'.$post->media)}}">to the PDF!</a></p>
              </object>
            @endif
    </div>
    <div class='pr-3 pl-3 pt-2 pb-2'>
        <div class=' flex flex-row text-xs'>
        <img alt="" data-reaction-type="LIKE" src='/assets/likeIMG.svg' class="lazy-loaded likeIcon mr-1 w-[16px] h-[16px]" />
        @if ($post->likes == null)
            0
        @else
            {{$post->likes}}
        @endif
        </div>
        <div class='w-full flex flex-row justify-between items-center'>
            <button class='text-base text-gray-600 hover:bg-gray-100 p-2 flex flex-row items-center'>
                <img class='mr-1  w-[24px] h-[24px]' src='/assets/like.svg' width={24} height={24} alt="" /> Recomendar
            </button>
            <button onclick="toggleModalComment(${idPost})" class='text-base text-gray-600 hover:bg-gray-100 p-2 flex flex-row items-center'>
                <img class='mr-1 w-[24px] h-[24px]' src='/assets/comment.svg' width={24} height={24} alt="" />Comentar
            </button>
            <button class='text-base text-gray-600 hover:bg-gray-100 p-2 flex flex-row items-center'>
                <img class='mr-1 w-[24px] h-[24px]' src='/assets/share.svg' width={24} height={24} alt="" />Compartir
            </button>

        </div>
    </div>
    </a>
</div>
            @endforeach
        </div>
        <button class="w-[95%] md:w-[70%] p-3 bg-white" onclick="document.getElementById('posts').classList.toggle('collapsablePosts')">
            Mostrar Mas
        </button>
        <div id="works" class=" collapsableWorks flex flex-col w-[95%] md:w-[70%] p-3 bg-white mt-[20px]">
            <center><h1>Empleos</h1></center>
            @foreach($works as $work)
                <a href="/job/{{$work->id}}" class="w-full">
                    <div class="flex flex-row jobItem items-center">
                        <img width="48" height="48" src="/storage/{{$work->photo}}" class="mr-2" alt="">
                        <div>
                            <h1 class="titleJob">{{$work->name}}</h1>
                            <h3 class="mediumJob">{{$work->username}}</h3>
                            <h6 class="infoJob">
                                <span>{{$work->location}}</span>
                                <span class="dot-separator" aria-hidden="true"></span>
                                <span></span>
                            </h6>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
        <button class="w-[95%] md:w-[70%] p-3 bg-white" onclick="document.getElementById('works').classList.toggle('collapsableWorks')">
            Mostrar Mas
        </button>
    </main>
</body>
</html>