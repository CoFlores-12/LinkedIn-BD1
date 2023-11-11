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
    <script src="{{ URL::asset('js/moment.min.js')}}"></script>
    <style>
        .comment__body, .comment__body button {
  background-color: #f3f2ef;
}
.link-styled {
  font-weight: 400 !important;
  font-size: 1rem !important;
}
    </style>
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
            <span class="text-xs text-gray-600" id="timepost"></span>
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
            <span id="likeCount-{{$post->id}}"> {{count($likes)}} </span>
        </div>
        <div class='w-full flex flex-row justify-between items-center'>
            @if ($liked == null)
            <button onclick="like('{{$post->id}}')" class='text-base text-gray-600 hover:bg-gray-100 p-2 flex flex-row items-center' id="likeBtn-{{$post->id}}">
                <img class='mr-1  w-[24px] h-[24px]' src='/assets/like.svg' width={24} height={24} alt="" />
                <span> Recomendar </span>
            </button>
            @else
            <button onclick="like('{{$post->id}}')" class='text-base text-gray-600 hover:bg-gray-100 p-2 liked flex flex-row items-center' id="likeBtn-{{$post->id}}">
                <img class='mr-1  w-[24px] h-[24px]' src='/assets/liked.svg' width={24} height={24} alt="" />
                <span> Recomendado </span>
            </button>
            @endif
            <button onclick="toggleModalComment({{$post->id}})" class='text-base text-gray-600 hover:bg-gray-100 p-2 flex flex-row items-center'>
                <img class='mr-1 w-[24px] h-[24px]' src="{{ URL::asset('assets/comment.svg')}}" width={24} height={24} alt="" />Comentar
            </button>
            <button class='text-base text-gray-600 hover:bg-gray-100 p-2 flex flex-row items-center'>
                <img class='mr-1 w-[24px] h-[24px]' src={{ URL::asset('assets/share.svg')}} width={24} height={24} alt="" />Compartir
            </button>

        </div>
    </div>
    <div class="ml-3 mr-3">
    @foreach($comments as $comment)
    <section class="comment flex grow-1 items-stretch leading-[16px]" data-is-comment-initialized="true">
            <div>
              <a href="/in/{{$comment->id}}" data-tracking-control-name="feed-detail_comments-list_comment_actor-image" data-tracking-will-navigate="">
                
                <img src="/storage/{{$comment->photo}}" class="inline-block relative rounded-[50%] w-8 h-8 lazy-loaded" data-ghost-classes="bg-color-entity-ghost-background">
            
              </a>
            </div>
            <div class="w-full min-w-0">
              <div class="comment__body ml-0.5 mb-1 pt-1 pr-1.5 pb-1 pl-1.5 rounded-[8px] rounded-tl-none relative">
                <div class="comment__header flex flex-col">
                      <a class="text-sm link-styled no-underline leading-open comment__author truncate pr-6" href="/in/{{$comment->id}}" data-tracking-control-name="feed-detail_comments-list_comment_actor-name" data-tracking-will-navigate="">
                      {{$comment->name}}
                      </a>
                      <p class="!text-xs text-color-text-low-emphasis leading-[1.33333] mb-0.5 truncate comment__author-headline">{{$comment->nombre}}</p>
                  
            <span class="text-xs text-color-text-low-emphasis comment__duration-since absolute right-6 top-1 inline-block">
            </span>
    
                </div>
                
      <div class="attributed-text-segment-list__container relative mt-1 mb-1.5 babybear:mt-0 babybear:mb-0.5">
        <p class="attributed-text-segment-list__content text-color-text !text-sm whitespace-pre-wrap break-words
             comment__text babybear:mt-0.5" dir="ltr">{{$comment->comment}}</p>
    <!---->  </div>
    
                
    <!---->      
    <!---->          </div>
            
          
            </div>
          </section>
    @endforeach
    </div>
</div>
<script>
    let isPendding = false;
const like = (idPost) => {
    if (isPendding) {
        return;
    }
    isPendding = true;
    let likesCount = document.getElementById('likeCount-'+idPost);
    let likesBtn = document.getElementById('likeBtn-'+idPost);
    if (likesBtn.classList.contains('liked')) {
        likesCount.innerHTML = parseInt(likesCount.innerHTML)-1;
        likesBtn.children[1].innerHTML = 'Recomendar';
        likesBtn.children[0].src = '/assets/like.svg';
        likesBtn.classList.remove('liked')
    }else{
        likesCount.innerHTML = parseInt(likesCount.innerHTML)+1;
        likesBtn.children[1].innerHTML = 'Recomendado';
        likesBtn.children[0].src = '/assets/liked.svg';
        likesBtn.classList.add('liked')
    }
    fetch('/like/'+idPost, {method: 'GET'})
        .then(response => response.json())
        .then(response => {
            isPendding = false;
        });
}

function publicarComment() {
    const comment = document.getElementById('commentInput');
    if (comment.value == '' || idPostGlobal == null) {
        return
    }
    let formData = new FormData();
      formData.append('comment', comment.value);
      formData.append('id', idPostGlobal);
      const options = {method: 'POST', body: formData};
    fetch('/comments', options)
            .then(response => response.json())
            .then(response => {
                
            })
}

(()=>{
    const timepost = document.getElementById('timepost');
    var fecha1 = moment('{{$post->datepost}}', "YYYY-MM-DD HH:mm:ss");
    var fecha2 = moment();

    var diff = fecha2.diff(fecha1, 'd'); 
    var prefijo = 'dias';
    if (diff < 1) {
        diff = fecha2.diff(fecha1, 'hours'); 
        var prefijo = 'horas';
        if (diff < 1) {
            var prefijo = 'minutos';
            diff = fecha2.diff(fecha1, 'minutes'); 
        }
        if (diff < 1) {
            var prefijo = 'segundos';
            diff = fecha2.diff(fecha1, 'seconds'); 
        }
    }else{if (diff > 7) {
        var diff = fecha2.diff(fecha1, 'weeks');
        var prefijo = 'semanas';
    }if (diff > 4) {
        var diff = fecha2.diff(fecha1, 'months'); 
        var prefijo = 'meses';
    }if (diff > 12) {
        var diff = fecha2.diff(fecha1, 'years'); 
        var prefijo = 'años';
    }}

    timepost.innerHTML = 'hace ' + diff + ' ' + prefijo;
})();
</script>
</body>
</html>