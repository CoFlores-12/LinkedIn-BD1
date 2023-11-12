<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <title>Laravel Search</title>
    <style>
textarea{
    border: 1px solid #eee;
    padding:5px !important;
}.btnIni {
    background-color: #0073b1;
    border: 0;
    border-radius: 2px;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
    color: #fff;
    cursor: pointer;
    display: inline-block;
    font-size: 1rem;
    font-weight: 600;
    font-family: inherit;
    line-height: 40px;
    overflow: hidden;
    outline-width: 2px;
    padding: 7px 24px;
    position: relative;
    text-align: center;
    text-decoration: none;
    -webkit-transition-duration: 167ms;
    transition-duration: 167ms;
    -webkit-transition-property: background-color,color,-webkit-box-shadow;
    transition-property: background-color,color,-webkit-box-shadow;
    transition-property: background-color,box-shadow,color;
    transition-property: background-color,box-shadow,color,-webkit-box-shadow;
    -webkit-transition-timing-function: cubic-bezier(0, 0, 0.2, 1);
    transition-timing-function: cubic-bezier(0, 0, 0.2, 1);
    vertical-align: middle;
    z-index: 0;
    background: var(--color-action, #0a66c2) !important;
    border-radius: 28px !important;
}
    </style>
</head>
<body>
    <div class="container mt-5">
    <!-- Search input -->
    <form>
        <input
            type="search"
            class="form-control"
            placeholder="Buscar Usuario"
            name="search"
            value="{{ request('search') }}"
        >
    </form>

    <!-- List items -->
    <ul class="list-group mt-3" id="listUsers">
        @forelse($users as $user)
            <li class="list-group-item flex flex-row" id="user-{{$user->id}}" onclick="selectUser('{{$user->id}}')"><img class="w-[24px] rounded-full mr-3" src="/storage/{{$user->photo}}" alt="">{{ $user->name }}</li>
        @empty
            <li class="list-group-item list-group-item-danger">User Not Found.</li>
        @endforelse
    </ul>

    <form action="/message/compose" method="post" id="msgCompose" class="flex flex-col hidden mt-2">
        <input type="hidden" name="id" id="idUser">
        <textarea name="msg" id="msg" cols="30" rows="10" placeholder="Escribe algo"></textarea>
        <button class="mt-2 btnIni">Enviar</button>
    </form>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script>
        const queryString = window.location.search;
        const urlParams = new URLSearchParams(queryString);
        const viewParam = Boolean( urlParams.get('search') );
        const listUsers = document.getElementById('listUsers');
        const idUser = document.getElementById('idUser');
        const msgCompose = document.getElementById('msgCompose');
        if (!viewParam) {
            listUsers.classList.add('hidden');
        }

        function selectUser(id) {
            idUser.value = id;
            msgCompose.classList.remove('hidden');
            let userseleted = document.querySelectorAll('.list-group-item-success');
            for (var i = 0; i < userseleted.length; i++) {
                userseleted[i].classList.remove('list-group-item-success');
            };
            document.getElementById('user-'+id).classList.add('list-group-item-success');
        }
    </script>
</body>
</html>