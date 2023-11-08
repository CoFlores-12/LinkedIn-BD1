<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publicacion | Feed | LinkedIn</title>
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <link rel="stylesheet" href="{{ URL::asset('css/login.css')}}">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/1e8824e8c2.js" crossorigin="anonymous"></script>
</head>
<body>
    
    <div class="flex flex-col w-full mt-1 mb-2 bg-white md:w-[50%] sm:w-[75%]">
    <div class="flex flex-row pr-3 pl-3 pt-2" style="text-overflow: 'ellipsis'; overflow:'hidden'; white-space:'nowrap'">
        @if($post->photo == null)
              <img class="h-12 aspect-square"  src="{{URL::asset('assets/profile.svg')}}">
            @else 
              <img class="h-12 aspect-square"  src="/storage/{{$post->photo}}">
            @endif
        <div class="flex flex-col ml-2 text-color-text-low-emphasis">
        <a href="/in/${$post->users_id}">
            <span class="text-black text-base" style="text-overflow: 'ellipsis'; overflow:'hidden'; white-space:'nowrap'">{{$post->name}}</span>
        </a>
            <span class="text-xs text-gray-600"> {{$followers[0]->followers}} seguidores</span>
            <span class="text-xs text-gray-600">{{0}} dias </span>
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
        <img alt="" data-reaction-type="LIKE" src="{{ URL::asset('assets/likeIMG.svg')}}" class="lazy-loaded likeIcon mr-1 w-[16px] h-[16px]" />
            {{count($likes)}}
        </div>
        <div class='w-full flex flex-row justify-between items-center'>
            <button class='text-base text-gray-600 hover:bg-gray-100 p-2 flex flex-row items-center'>
                <img class='mr-1  w-[24px] h-[24px]' src="{{ URL::asset('assets/like.svg')}}" width={24} height={24} alt="" /> Recomendar
            </button>
            <button onclick="toggleModalComment({{$post->id}})" class='text-base text-gray-600 hover:bg-gray-100 p-2 flex flex-row items-center'>
                <img class='mr-1 w-[24px] h-[24px]' src="{{ URL::asset('assets/comment.svg')}}" width={24} height={24} alt="" />Comentar
            </button>
            <button class='text-base text-gray-600 hover:bg-gray-100 p-2 flex flex-row items-center'>
                <img class='mr-1 w-[24px] h-[24px]' src={{ URL::asset('assets/share.svg')}} width={24} height={24} alt="" />Compartir
            </button>

        </div>
    </div>
</div>

</body>
</html>