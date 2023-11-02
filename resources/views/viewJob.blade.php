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
</head>
<body>
    <div>
        <h1>{{$job->name}}</h1>
        <div>
            {{$job->username}} | {{$job->location}} | 0 solicitudes
        </div>
        <h2>Acerca del empleo</h2>
        {{$job->description}}
        <h2>Acerca de la empresa</h2>
        {{$job->username}}
    </div>
</body>
</html>