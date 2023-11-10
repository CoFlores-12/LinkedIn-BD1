<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JOBS | LinkedIn</title>
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <link rel="stylesheet" href="{{ URL::asset('css/login.css')}}">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/1e8824e8c2.js" crossorigin="anonymous"></script>
    <style>
        .jobItem {
  padding: 1.3rem 1.2rem !important;
  font-size: 0.7rem !important;
}
.jobItem:hover {
  background-color: #eee;
}
.dot-separator::before {
  display: inline-block;
  margin-left: 4px;
  content: "\00b7\00a0";
  font-weight: bold;
}

.dot-separator::before {
  display: inline-block;
  margin-left: 4px;
  content: "\00b7\00a0";
  font-weight: bold;
}

.titleJob {
  font-size: 1rem;
  font-weight: 500;
}

.mediumJob {
  font-size: 0.9rem;
  font-weight: 400;
}
.infoJob {
  font-size: 0.7rem;
  font-weight: 400;
  color: rgba(0, 0, 0, 0.555);
}
.jobItem {
  border-bottom: 1px solid rgba(0, 0, 0, 0.08);
}
    </style>
</head>
<body>
    @foreach($users as $user)
        <a href="/in/{{$user->id}}" class="w-full">
            <div class="flex flex-row jobItem items-center">
                <img class="w-[48px] h-[48px] mr-2" src="/storage/{{$user->photo}}"alt="">
                <div>
                    <h1 class="titleJob">{{$user->name}}</h1>
                    <h3 class="mediumJob">{{$user->nombre}}</h3>
                    <h6 class="infoJob">
                        <span>{{$user->location}}</span>
                        <span class="dot-separator" aria-hidden="true"></span>
                        <span></span>
                    </h6>
                </div>
            </div>
        </a>
    @endforeach
</body>
</html>