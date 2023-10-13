<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <link rel="stylesheet" href="{{ URL::asset('css/login.css')}}">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/1e8824e8c2.js" crossorigin="anonymous"></script>
    <style>
        :root{
            --color-background-base: #fff;
            --color-background-container: #fff;
            --color-background-container-tint: #f8fafd;
        }
.text-heading-xlarge {
    font-size: 2rem;
    font-weight: 600;
    line-height: 1.25;
}
.break-words {
    overflow-wrap: break-word!important;
    word-wrap: break-word!important;
    word-break: break-word!important;
}
.v-align-middle {
    vertical-align: middle!important;
}
.pv-top-card__photo-wrapper {
    background-clip: border-box;
    background-color: var(--color-background-container);
}

.pv-cover-story--colored-border, .pv-top-card__photo-wrapper {
    width: 160px;
    height: 160px;
    box-sizing: border-box;
    border-radius: 49.9%;
}
.pv-top-card__photo-wrapper {
    border: 4px solid var(--color-background-container);
    box-shadow: none;
    margin: auto;
    position: absolute;
    top: -90%;
}
.pv-top-card__photo-wrapper {
    background-clip: border-box;
    background-color: var(--color-background-container);
}
.pv-cover-story--colored-border, .pv-top-card__photo-wrapper {
    width: 160px;
    height: 160px;
    box-sizing: border-box;
    border-radius: 49.9%;
}
.pv-top-card__edit-photo {
    width: 100%;
    height: 100%;
    background-color: var(--color-background-container-tint);
    display: block;
}

.profile-photo-edit, .profile-photo-edit__preview {
    width: 160px;
    height: 160px;
    border-radius: 50%;
}
.profile-photo-edit {
    margin: 0 auto;
    position: relative;
    background-color: var(--color-background-container-tint);
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    box-sizing: border-box;
   
}
.profile-photo-edit__camera-plus-frame {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    pointer-events: none;
    border-radius: 50%;
}
    </style>
</head>
<body>
    <nav>
        
    </nav>
    <div>
        <img class="w-full" src="{{$user->banner}}" alt="">
        <div class="pl-3 pt-10 pr-3 relative">
        <div class="pv-top-card__photo-wrapper ml0">
            <div class="profile-photo-edit pv-top-card__edit-photo">
                  <img alt="Cesar Flores, #OPEN_TO_WORK" class="profile-photo-edit__camera-plus-frame" src="{{$user->photo}}">
                  </div>
          
                </div>
            <h2 class="text-heading-xlarge inline t-24 v-align-middle break-words">{{$user->name}}</h2>
            <h3>{{$user->location}}</h3>
            <p>{{$user->info}}</p>
        </div>
    </div>
</body>
</html>