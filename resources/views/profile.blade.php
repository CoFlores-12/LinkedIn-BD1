<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <link rel="stylesheet" href="{{ URL::asset('css/profile.css')}}">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/1e8824e8c2.js" crossorigin="anonymous"></script>

</head>
<body>
    <nav>
        
    </nav>
    <div>
        <div class="banner">
            <img class="w-full"  src="{{$user->banner}}" alt="">

        </div>
        <div class="pl-3 pt-[80px] pr-3 relative">
        <div class="pv-top-card__photo-wrapper ml0">
            <div class="profile-photo-edit pv-top-card__edit-photo">
                  <img alt="" class="profile-photo-edit__camera-plus-frame" src="{{$user->photo}}">
                  </div>
          
             </div>
            <h2 class="text-heading-xlarge inline v-align-middle break-words">{{$user->name}}</h2>
            <h3>{{$user->location}}</h3>
            <p>{{$user->info}}</p>
        </div>
    </div>
</body>
</html>