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
            <img class="cover-img__image relative w-full h-full object-cover" src="https://media.licdn.com/dms/image/D4E3DAQFYI0PppESHRg/image-scale_191_1128/0/1673930997753/unahoficial_cover?e=1698606000&amp;v=beta&amp;t=yvg0Q_ikDmOvH9e947FhnrDW17xwpig9Hq6AuwdzuwQ" fetchpriority="auto" data-embed-id="cover-image" alt="" style="width: 543.33px; height: 92px; top: 0px; left: 0px;">
        </div>
      </div>
    </figure>
  

      <div class="top-card-layout__card relative p-[16px] papabear:p-details-container-padding">
            <div class="top-card-layout__entity-image-container flex">
      <img class="inline-block relative w-[96px] h-[96px] top-card-layout__entity-image shadow-color-shadow shadow-[0_4px_12px] border-2 border-solid border-color-surface mt-[-70px] mb-[14px] papabear:border-4 papabear:mt-[-100px] papabear:mb-[18px] lazy-loaded" data-ghost-classes="bg-color-entity-ghost-background" data-ghost-url="https://static.licdn.com/aero-v1/sc/h/6qpnald1ddva78jx4bnnl3vw" alt="Universidad Nacional Autónoma de Honduras (UNAH)" aria-busy="false" src="https://media.licdn.com/dms/image/D4E0BAQGTRAHntOfgTg/company-logo_200_200/0/1667698674172?e=1706140800&amp;v=beta&amp;t=EE0UWH7S_xOD1yO6Rij5DA4HZyaSOAReV4M03lfgN60">
  
            </div>

          <div class="top-card-layout__entity-info-container flex flex-wrap papabear:flex-nowrap">
            <div class="top-card-layout__entity-info flex-grow flex-shrink-0 basis-0 babybear:flex-none babybear:w-full babybear:flex-none babybear:w-full">
                  <h1 class="top-card-layout__title font-sans text-lg papabear:text-xl font-bold leading-open text-color-text mb-0">
                  {{$user->name}}
                  </h1>
                <h2 class="top-card-layout__headline break-words font-sans text-md leading-open text-color-text">
                  null
                </h2>

                <h3 class="top-card-layout__first-subline font-sans text-md leading-open text-color-text-low-emphasis">
                  
                {{$user->location}} <span class="before:middot"></span>0 seguidores
      
                </h3>

                <h4 class="top-card-layout__second-subline font-sans text-sm leading-open text-color-text-low-emphasis mt-0.5">
                  
        <span class="line-clamp-2">{{$user->info}}</span>
      
                </h4>

              <div class="top-card-layout__cta-container flex flex-wrap mt-0.5 papabear:mt-0 ml-[-12px]">
                    
            
    
    
    

    <div class="follow-button inline-flex babybear:flex-auto flex-1" data-entity-urn="urn:li:organization:15094191">
      <button class="follow-button__follow w-full  mt-2 ml-1.5 h-auto babybear:flex-auto btn-md btn-secondary-emphasis  flex flex-row justify-center items-center" >
          <svg class="lazy-loaded w-[16px] h-[16px]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" data-supported-dps="16x16" fill="currentColor" width="16" height="16" focusable="false" class="lazy-loaded" aria-busy="false">
  <path d="M14 9H9v5H7V9H2V7h5V2h2v5h5z"></path>
</svg>
        <span class="follow-button__follow_text">
            Seguir
        </span>
      </button>
      <button class="follow-button__following hidden flex flex-row justify-center items-center
          w-full mt-2 ml-1.5 h-auto babybear:flex-auto btn-md btn-secondary-emphasis">
          <svg class="lazy-loaded w-[16px] h-[16px]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" data-supported-dps="16x16" fill="currentColor" focusable="false" class="w-2 h-2 lazy-loaded" aria-busy="false">
  <path d="M12.57 2H15L6 15l-5-5 1.41-1.41 3.31 3.3z"></path>
</svg>
        <span class="follow-button__following_text">
            Siguiendo
        </span>
      </button>
    </div>
  
  
      

                    
          <a class="mt-2 ml-1.5 h-auto babybear:flex-auto btn-md btn-primary flex-1" href="https://www.linkedin.com/jobs/search?geoId=92000000&amp;f_C=15094191&amp;company=Universidad+Nacional+Aut%C3%B3noma+de+Honduras+%28UNAH%29&amp;trk=top-card_top-card-secondary-button-top-card-secondary-cta" data-tracking-control-name="top-card_top-card-secondary-button-top-card-secondary-cta" data-tracking-will-navigate="">
            Ver empleos
          </a>
      
              </div>
            </div>

<!---->          </div>

      </div>
    </section>
</body>
</html>