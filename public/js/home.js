const container = document.getElementById('container');
    const postContainer = document.getElementById('postContainer');
    const redContainer = document.getElementById('redContainer');
    const notiContainer = document.getElementById('notiContainer');
    const jobsContainer = document.getElementById('jobsContainer');
    const sugerencias = document.getElementById('sugerencias');
    const jobsList = document.getElementById('listJobs');
    const btnsNav = document.getElementById('btnsNav');

const job = (title, farm, location, id, logo)=>{
    return `<a href="/job/${id}" class="w-full">
                <div class="flex flex-row jobItem items-center">
                        <img class="w-[48px] h-[48px] mr-2"  src="/storage/${logo}" alt="">
                        <div>
                            <h1 class="titleJob">${title}</h1>
                            <h3 class="mediumJob">${farm}</h3>
                            <h6 class="infoJob">
                                <span>${location}</span>
                                <span class="dot-separator" aria-hidden="true"></span>
                                <span></span>
                            </h6>
                        </div>
                    </div>
               </a>`
}

const publicacion = (name, followers, date, content, media, likes, logo, id, idPost, type, liked) => {
    mediaToShow = '';
    if (type == "image/png") {
        mediaToShow = `<img src="/storage/${media}">`
    }
    if (type == 'video/mp4') {
        mediaToShow = `<video style="width=100%" controls>
                  <source src="/storage/${media}" type="video/mp4">
                  Your browser does not support the video tag.
                </video>`
    }
    if (type == 'application/pdf') {
        mediaToShow = ` <object data="/storage/${media}" type="application/pdf" width="100%" height="100%">
                <p>Alternative text - include a link <a href="/storage/${media}">to the PDF!</a></p>
              </object>`
    }

    let likeBtn = liked == null ? `<button onclick="like('${idPost}')" class='text-base text-gray-600 hover:bg-gray-100 p-2 flex flex-row items-center' id="likeBtn-${idPost}">
                <img class='mr-1  w-[24px] h-[24px]' src='/assets/like.svg' width={24} height={24} alt="" />
                <span> Recomendar </span>
            </button>` : `<button onclick="like('${idPost}')" class='text-base text-gray-600 hover:bg-gray-100 p-2 liked flex flex-row items-center' id="likeBtn-${idPost}">
                <img class='mr-1  w-[24px] h-[24px]' src='/assets/liked.svg' width={24} height={24} alt="" />
                <span> Recomendado </span>
            </button>`

    var fecha1 = moment(date, "YYYY-MM-DD HH:mm:ss");
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
    return `<div class="flex flex-col w-full mt-1 mb-2 bg-white md:w-[50%] sm:w-[75%]">
    <a href="/feed/${idPost}">
    <div class="flex flex-row pr-3 pl-3 pt-2" style="text-overflow: 'ellipsis'; overflow:'hidden'; white-space:'nowrap'">
        <img class="h-12 aspect-square" src="storage/${logo}" alt="" />
        <div class="flex flex-col ml-2 text-color-text-low-emphasis">
        <a href="/in/${id}">
            <span class="text-black text-base" style="text-overflow: 'ellipsis'; overflow:'hidden'; white-space:'nowrap'">${name}</span>
        </a>
            <span class="text-xs text-gray-600">${followers} seguidores</span>
            <span class="text-xs text-gray-600">hace ${diff} ${prefijo}</span>
        </div>
    </div>
    <div>
        <div  class="pl-3 pr-3 text-sm">
        <span>${content}</span>
        </div>
        ${mediaToShow}
    </div>
    <div class='pr-3 pl-3 pt-2 pb-2'>
        <div class=' flex flex-row text-xs'>
        <img alt="" data-reaction-type="LIKE" src='assets/likeIMG.svg' class="lazy-loaded likeIcon mr-1 w-[16px] h-[16px]" />
           <span id="likeCount-${idPost}"> ${likes == null ? 0 : likes} </span>
        </div>
        <div class='w-full flex flex-row justify-between items-center'>
            ${likeBtn}
            <button onclick="toggleModalComment('${idPost}')" class='text-base text-gray-600 hover:bg-gray-100 p-2 flex flex-row items-center'>
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

const notification = (idpost, photo, name, desc, pendding) => {
    return `<a class="w-full" href="/viewNotification/${idpost}">
            <div class="notificacion ${pendding ? 'pendding' : ''}">
                <img src="/storage/${photo}" alt="">
                <p><span>${name}</span> ${desc}</p>
            </div>
        </a> `
}
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
            postContainer.classList.remove('hidden');
            redContainer.classList.add('hidden');
            notiContainer.classList.add('hidden');
            jobsContainer.classList.add('hidden');
            break;
    }
}
document.getElementById("busquedaInp")
    .addEventListener("keyup", function(event) {
    event.preventDefault();
    if (event.keyCode === 13) {
        window.location.href = '/busqueda/'+event.srcElement.value;
    }
});
const toggleModalShare = () => {
    const modal = document.getElementById('modalShare');
    modal.classList.toggle('hidden');
    const container = document.getElementById('container');
    container.classList.toggle('hidden');
}
let idPostGlobal = null;
const toggleModalComment = (idpost) => {
    idPostGlobal = idpost;
    const modal = document.getElementById('modalComment');
    const commentList = document.getElementById('commentsList');
    commentList.innerHTML = '<div class="contloader"><span class="loader2"></span></div>'
    modal.classList.toggle('hidden');
    const container = document.getElementById('container');
    container.classList.toggle('hidden');
    fetch('/comments/'+idpost, {method: 'GET'})
    .then(response => response.json())
    .then(response => {
        commentList.innerHTML = ''
        response.forEach(element => {
            commentList.innerHTML += `<section class="comment flex grow-1 items-stretch leading-[16px]" data-is-comment-initialized="true">
            <div>
              <a href="/in/${element.id}" data-tracking-control-name="feed-detail_comments-list_comment_actor-image" data-tracking-will-navigate="">
                
                <img src="/storage/${element.photo}" class="inline-block relative rounded-[50%] w-8 h-8 lazy-loaded" data-ghost-classes="bg-color-entity-ghost-background">
            
              </a>
            </div>
            <div class="w-full min-w-0">
              <div class="comment__body ml-0.5 mb-1 pt-1 pr-1.5 pb-1 pl-1.5 rounded-[8px] rounded-tl-none relative">
                <div class="comment__header flex flex-col">
                      <a class="text-sm link-styled no-underline leading-open comment__author truncate pr-6" href="/in/${element.id}" data-tracking-control-name="feed-detail_comments-list_comment_actor-name" data-tracking-will-navigate="">
                      ${element.name}
                      </a>
                      <p class="!text-xs text-color-text-low-emphasis leading-[1.33333] mb-0.5 truncate comment__author-headline">${element.nombre == null ? '' : element.nombre}</p>
                  
            <span class="text-xs text-color-text-low-emphasis comment__duration-since absolute right-6 top-1 inline-block">
            </span>
    
                </div>
                
      <div class="attributed-text-segment-list__container relative mt-1 mb-1.5 babybear:mt-0 babybear:mb-0.5">
        <p class="attributed-text-segment-list__content text-color-text !text-sm whitespace-pre-wrap break-words
             comment__text babybear:mt-0.5" dir="ltr">${element.comment}</p>
    <!---->  </div>
    
                
    <!---->      
    <!---->          </div>
            
          
            </div>
          </section>`;
        });
    })
}

function publicarComment() {
    const comment = document.getElementById('commentInput');
    if (comment.value == '' || idPostGlobal == null) {
        return
    }
    const commentList = document.getElementById('commentsList');
    let formData = new FormData();
      formData.append('comment', comment.value);
      formData.append('id', idPostGlobal);
      const options = {method: 'POST', body: formData};
    fetch('/comments', options)
            .then(response => response.json())
            .then(response => {
                console.log(response);
                commentList.innerHTML += `<section class="comment flex grow-1 items-stretch leading-[16px]" data-is-comment-initialized="true">
                <div>
                  <a href="/in/${response.user.id}" data-tracking-control-name="feed-detail_comments-list_comment_actor-image" data-tracking-will-navigate="">
                    
                    <img src="/storage/${response.user.photo}" class="inline-block relative rounded-[50%] w-8 h-8 lazy-loaded" data-ghost-classes="bg-color-entity-ghost-background">
                
                  </a>
                </div>
                <div class="w-full min-w-0">
                  <div class="comment__body ml-0.5 mb-1 pt-1 pr-1.5 pb-1 pl-1.5 rounded-[8px] rounded-tl-none relative">
                    <div class="comment__header flex flex-col">
                          <a class="text-sm link-styled no-underline leading-open comment__author truncate pr-6" href="/in/${response.user.id}" data-tracking-control-name="feed-detail_comments-list_comment_actor-name" data-tracking-will-navigate="">
                          ${response.user.name}
                          </a>
                          <p class="!text-xs text-color-text-low-emphasis leading-[1.33333] mb-0.5 truncate comment__author-headline">${response.user.nombre == null ? '' : response.user.nombre}</p>
                      
                <span class="text-xs text-color-text-low-emphasis comment__duration-since absolute right-6 top-1 inline-block">
                </span>
        
                    </div>
                    
          <div class="attributed-text-segment-list__container relative mt-1 mb-1.5 babybear:mt-0 babybear:mb-0.5">
            <p class="attributed-text-segment-list__content text-color-text !text-sm whitespace-pre-wrap break-words
                 comment__text babybear:mt-0.5" dir="ltr">${comment.value}</p>
        <!---->  </div>
        
                    
        <!---->      
        <!---->          </div>
                
              
                </div>
              </section>`;
            })
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
                    postContainer.innerHTML += publicacion(userPost.name, userPost.followers, userPost.datepost, userPost.content, userPost.media, userPost.likes, userPost.photo, userPost.users_id, userPost.id, userPost.type, userPost.liked);
                });
                
                //TODO: get jobs from api
                fetch('/jobs/get', {method: 'POST'})
                    .then(response => response.json())
                    .then(response => {
                        response.forEach(element => {
                            jobsList.innerHTML += job(element.name, element.username, element.location, element.id, element.photo)
                        });
                        fetch('/getNotifications', {method: 'GET'})
                            .then(response => response.json())
                            .then(response => {
                                response.forEach(element => {
                                    notiContainer.innerHTML += notification(element.id,element.photo,element.name, element.content, element.pennding == 0 ? false : true );
                                });
                                fetch('/getMyNetwork', {method: 'GET'})
            .then(response => response.json())
            .then(response => {
                response.forEach(element => {
                    sugerencias.innerHTML += `<div class="cardUser flex flex-col relative">
                <div class="bannercard" style="background:url('/storage/${element.banner}')" alt=""></div>
                    <img id="ppcard" src="/storage/${element.photo}" alt="">
                    <a href="/in/${element.id}"><span>${element.name}</span></a>
                    <span>${element.nombre == null ? '' : element.nombre}</span>
                    <footer class="mt-2">
                    <a href="/seguir/${element.id}"> <button class="artdeco-button artdeco-button--2 artdeco-button--secondary ember-view full-width">    <li-icon aria-hidden="true" type="connect" class="artdeco-button__icon" size="small"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" data-supported-dps="16x16" fill="currentColor" class="mercado-match" width="16" height="16" focusable="false">
                            <path d="M9 4a3 3 0 11-3-3 3 3 0 013 3zM6.75 8h-1.5A2.25 2.25 0 003 10.25V15h6v-4.75A2.25 2.25 0 006.75 8zM13 8V6h-1v2h-2v1h2v2h1V9h2V8z"></path>
                            </svg></li-icon>
                        <span class="artdeco-button__text">
                            Conectar
                        </span></button></a>
                    </footer>
                </div>`
                                });
                                document.getElementById('modalLoad').style.display = 'none';
            })
            .catch(err => window.location.href = '/login');
                               
                            })
                            .catch(err => window.location.href = '/login');
                    })
                    .catch(err => console.log(err));
               
    
                //TODO: get network from api
            })
            .catch(err => console.log(err));


        

    /*
        fetch('/getNotifications', {method: 'GET'})
            .then(response => response.json())
            .then(response => {
                response.forEach(element => {
                    container.innerHTML += publicacion(element.name, element.followers, element.date, element.content, element.media, element.likes, element.logo);
                });
            })
            .catch(err => window.location.href = '/login');
    */
})();

