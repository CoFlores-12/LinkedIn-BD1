<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$user->name}}</title>
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <link rel="stylesheet" href="{{ URL::asset('css/profile.css')}}">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/1e8824e8c2.js" crossorigin="anonymous"></script>

</head>
<body>
    <nav>
        
    </nav>
    <section class="top-card-layout container-lined overflow-hidden babybear:rounded-[0px]">
        
    <figure class="cover-img min-h-[87px] papbear:min-h-[100px] rounded-t-[2px] babybear:rounded-[0px] -z-1">
      <div class="cover-img__image-frame relative w-full overflow-hidden pb-[calc((134/782)*100%)]">
        <div class="cover-img__image-position absolute top-0 right-0 bottom-0 left-0
            ">
            @if($user->banner == null)
              <img class="cover-img__image relative w-full h-full object-cover" src="{{URL::asset('assets/banner1.svg')}}" fetchpriority="auto" data-embed-id="cover-image" alt="" >
            @else 
              <img class="cover-img__image relative w-full h-full object-cover" src="{{URL::asset('storage/'.$user->banner)}}" fetchpriority="auto" data-embed-id="cover-image" alt="">
            @endif
        </div>
      </div>
    </figure>
  

      <div class="top-card-layout__card relative p-[16px] papabear:p-details-container-padding">
            <div class="top-card-layout__entity-image-container flex">
            @if($user->photo == null)
              <img class="inline-block rounded-full relative w-[96px] h-[96px] top-card-layout__entity-image shadow-color-shadow shadow-[0_4px_12px] border-2 border-solid border-color-surface mt-[-70px] mb-[14px] papabear:border-4 papabear:mt-[-100px] papabear:mb-[18px] lazy-loaded"  src="{{URL::asset('assets/profile.svg')}}">
            @else 
              <img class="inline-block relative w-[96px] h-[96px] top-card-layout__entity-image shadow-color-shadow shadow-[0_4px_12px] border-2 border-solid border-color-surface mt-[-70px] mb-[14px] papabear:border-4 papabear:mt-[-100px] papabear:mb-[18px] lazy-loaded"  src="{{URL::asset('storage/'.$user->photo)}}">
            @endif
     
  
            </div>

          <div class="top-card-layout__entity-info-container flex flex-wrap papabear:flex-nowrap">
            <div class="top-card-layout__entity-info flex-grow flex-shrink-0 basis-0 babybear:flex-none babybear:w-full babybear:flex-none babybear:w-full relative">
              @if($myID == $user->id)
              <div class="absolute top-[-30px] right-6">
                <div>
                  <a href="{{route('users.editProfile')}}" id="ember35" class="ember-view" tabindex="-1">
                    <button aria-label="Editar presentación" id="ember36" class="artdeco-button artdeco-button--circle artdeco-button--muted artdeco-button--2 artdeco-button--tertiary ember-view mh1" type="button">    <li-icon aria-hidden="true" type="edit" class="artdeco-button__icon" size="large"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" data-supported-dps="24x24" fill="currentColor" class="mercado-match" width="24" height="24" focusable="false">
                    <path d="M21.13 2.86a3 3 0 00-4.17 0l-13 13L2 22l6.19-2L21.13 7a3 3 0 000-4.16zM6.77 18.57l-1.35-1.34L16.64 6 18 7.35z"></path>
                  </svg></li-icon>

                    <span class="artdeco-button__text">
                        
                    </span></button>
                  </a>
                </div>
              </div>
              @endif
                  <h1 class="top-card-layout__title font-sans text-lg papabear:text-xl font-bold leading-open text-color-text mb-0">
                  {{$user->name}}
                  </h1>
                <h2 class="top-card-layout__headline break-words font-sans text-md leading-open text-color-text">
                @if($user->categoryname != "usuario")
                  {{$user->categoryname}}
                @endif
                </h2>

                <h3 class="top-card-layout__first-subline font-sans text-md leading-open text-color-text-low-emphasis">
                  
                {{$user->location}} <span class="before:middot"></span>{{$followers[0]->followers}}  seguidores
      
                </h3>

                <h4 class="top-card-layout__second-subline font-sans text-sm leading-open text-color-text-low-emphasis mt-0.5">
                  
        <span class="line-clamp-2">{{$user->info}}</span>
      
                </h4>
                
                @if( $myID != $user->id )
                  <div class="top-card-layout__cta-container flex flex-wrap mt-0.5 papabear:mt-0 ml-[-12px]">
    <div class="follow-button inline-flex babybear:flex-auto flex-1" data-entity-urn="urn:li:organization:15094191">
      @if(!$following)
      <a  class=" w-full h-auto   flex flex-row justify-center items-center" href="/seguir/{{$user->id}}">
      <button class="follow-button__follow w-full  mt-2 ml-1.5 h-auto babybear:flex-auto btn-md btn-secondary-emphasis  flex flex-row justify-center items-center" >
          <svg class="lazy-loaded w-[16px] h-[16px]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" data-supported-dps="16x16" fill="currentColor" width="16" height="16" focusable="false" class="lazy-loaded" aria-busy="false">
  <path d="M14 9H9v5H7V9H2V7h5V2h2v5h5z"></path>
</svg>
        <span class="follow-button__follow_text">
            Seguir
        </span>
      </button>
      </a>
      @else
      <button class="follow-button__following flex flex-row justify-center items-center
          w-full mt-2 ml-1.5 h-auto babybear:flex-auto btn-md btn-secondary-emphasis">
          <svg class="lazy-loaded w-[16px] h-[16px]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" data-supported-dps="16x16" fill="currentColor" focusable="false" class="w-2 h-2 lazy-loaded" aria-busy="false">
  <path d="M12.57 2H15L6 15l-5-5 1.41-1.41 3.31 3.3z"></path>
</svg>
        <span class="follow-button__following_text">
            Siguiendo
        </span>
      </button>
      @endif
    </div>
  
  
      

                    
          <a class="mt-2 ml-1.5 h-auto babybear:flex-auto btn-md btn-primary flex-1" href="{{route('jobs.user.view', $user->id)}}" data-tracking-control-name="top-card_top-card-secondary-button-top-card-secondary-cta" data-tracking-will-navigate="">
            Ver empleos
          </a>
      
              </div>
            </div>
                @else
                <div class="top-card-layout__cta-container flex flex-wrap mt-0.5 papabear:mt-0 ml-[-12px]">
    <div class="follow-button inline-flex babybear:flex-auto flex-1" data-entity-urn="urn:li:organization:15094191">
     <a href={{route('jobs.create')}} class="w-full ml-1.5"> <button class="follow-button__follow w-full  mt-2 ml-1.5 h-auto babybear:flex-auto btn-md btn-secondary-emphasis  flex flex-row justify-center items-center" >
          <svg class="lazy-loaded w-[16px] h-[16px]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" data-supported-dps="16x16" fill="currentColor" width="16" height="16" focusable="false" class="lazy-loaded" aria-busy="false">
  <path d="M14 9H9v5H7V9H2V7h5V2h2v5h5z"></path>
</svg>
        <span class="follow-button__follow_text">
            Crear empleo
        </span>
      </button>
      </a>
    </div>
  
  
      

                    
          <a class="mt-2 ml-3 h-auto babybear:flex-auto btn-md btn-primary flex-1" href="{{route('jobs.user.view', $myID)}}" data-tracking-control-name="top-card_top-card-secondary-button-top-card-secondary-cta" data-tracking-will-navigate="">
            Ver mis empleos
          </a>
      
              </div>
            </div>
                @endif
              

<!---->          </div>

      </div>
    </section>




    <section id="edu" class="p-3 mt-3">
      <div class="txt-bold txt-heading">
        Educacion
      </div>
      @foreach($edu as $ed)
          <div class="edu">
            <h1>{{$ed->institute}}</h1>
            <p>{{$ed->location}}</p>
            <p>{{$ed->grade}}</p>
          </div>
        @endforeach
    </section>



    <section id="exp" class="p-3 mt-3">
      <div class="txt-bold txt-heading">
        Experiencia
      </div>
      <div>
        @foreach($exp as $ex)
          <div class="exp">
            <h1>{{$ex->company_name}}</h1>
            <p>{{$ex->location}}</p>
            <p>{{$ex->occupation}}</p>
          </div>
        @endforeach
      </div>
    </section>


    <section id="skills" class="p-3 mt-3">
      <div class="txt-bold txt-heading">
        Habilidades
      </div>
      <div id="skillscont">
        @foreach($skills as $skill)
            <span id="skill-{{$skill->name}}" class="skill">{{$skill->name}}</span>
        @endforeach
      </div>
    </section>


    <section id="publicaciones" class="p-3 mt-3">
      <div class="txt-bold txt-heading">
        Publicaciones
      </div>
      <div class="allpubli flex flex-row">
        @foreach($publicaciones as $publicacion)
          <div class="publicacion">
            <a href="{{route('post.ver', $publicacion->id)}}">
            <div class="infoPubli">
              {{$publicacion->content}}
            </div>
            <div class="imgpubli">
            @if($publicacion->type == 'image/png' || $publicacion->type == 'image/jpg'  || $publicacion->type == 'image/jpeg')
                <img src="{{ URL::asset('storage/'.$publicacion->media)}}">
            @endif
            @if($publicacion->type == 'video/mp4')
                <video style="width=100%" controls>
                  <source src="{{ URL::asset('storage/'.$publicacion->media)}}" type="video/mp4">
                  Your browser does not support the video tag.
                </video>
            @endif
            @if($publicacion->type == 'application/pdf')
              <object data="{{ URL::asset('storage/'.$publicacion->media)}}" type="application/pdf" width="100%" height="100%">
                <p>Alternative text - include a link <a href="{{ URL::asset('storage/'.$publicacion->media)}}">to the PDF!</a></p>
              </object>
            @endif
            </div>
            </a>
          </div>
        @endforeach
      </div>
    </section>
</body>
</html>