<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>| LinkedIn</title>
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <link rel="stylesheet" href="{{ URL::asset('css/login.css')}}">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/1e8824e8c2.js" crossorigin="anonymous"></script>
    <style>
        h1 {
            font-weight: 500 !important;
            font-size: 1.5rem !important;
        }
        h2 {
            font-weight: 500 !important;
            font-size: 1.2rem !important;
        }
        .infojob {
            font-size: 0.8rem;
            margin-bottom: 20px !important;
        }
        .soli {
            color: #01754f;
        }
        button {
            background: #0a66c2 !important;
            color:#fff !important;
        }
        .artdeco-button--3, .artdeco-button--4 {
    border-radius: 2.4rem!important;
}

.artdeco-button--3 {
    padding-left: 2rem!important;
    padding-right: 2rem!important;
}
.artdeco-button, .peek-carousel-controls__button {
    min-width: 0;
}
.artdeco-button--icon-right {
    flex-direction: row-reverse;
}
.artdeco-button, .peek-carousel-controls__button {
    transition-timing-function: cubic-bezier(.4,0,.2,1);
    transition-duration: 167ms;
    align-items: center;
    border: none;
    border-radius: 2px;
    box-sizing: border-box;
    cursor: pointer;
    font-family: inherit;
    font-weight: 600;
    display: inline-flex;
    justify-content: center;
    overflow: hidden;
    text-align: center;
    transition-property: background-color,box-shadow,color;
    vertical-align: middle;
}
.artdeco-button--3 {
    font-size: 1.2rem;
    margin-bottom: 20px !important;
    padding: 5px 2.5px;
}
.card {
    border-radius: 10px;
    border:1px solid #eee;
    padding:10px;
    font-size: 0.8rem;
    color: rgb(0 0 0/.6)
}
.username {
    font-weight: 500 !important;
    font-size: 1rem;
    color: #000
}
.category {
    color: #000
}
    </style>
</head>
<body>
    <div class="p-4">
        <h1>{{$job->name}}</h1>
        <div class="infojob">
        <a class="username" href="/in/{{$user->id}}">{{$user->name}}</a> | {{$job->location}} | <span class="soli">{{$applications->applications}} solicitudes</span>
        </div>
        <a href="/jobs/solicitar/{{$job->id}}">
        <button role="link" id="ember521" class="jobs-apply-button artdeco-button artdeco-button--icon-right artdeco-button--3 artdeco-button--primary ember-view">        
        <span class="artdeco-button__text">
            Solicitar
        </span></button>
        </a>
        <h2>Acerca del empleo</h2>
        {{$job->description}}
        <div class="card mt-5">
            <h2 class="mb-5">Acerca de la empresa</h2>
            <div class="flex flex-row">
                <img class="w-[72px] h-[72px] mr-3" src="/storage/{{$user->photo}}" alt="">
                <div class="flex flex-col">
                    <a class="username" href="/in/{{$user->id}}">{{$user->name}}</a>
                    {{$user->followers}} seguidores
                </div>
            </div>
            <div class="mt-5 category">{{$user->nombre}} </div>
            <div class="info mt-5">
            {{$user->info}}
            </div>
        </div>
    </div>
</body>
</html>