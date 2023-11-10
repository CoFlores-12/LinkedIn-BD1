<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>new job | LinkedIn</title>
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <link rel="stylesheet" href="{{ URL::asset('css/forms.css')}}">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/1e8824e8c2.js" crossorigin="anonymous"></script>
    <style>
        h1 {
            font-size: 2.5rem !important;
            font-weight: 700 !important;
        }
    </style>
</head>
<body>
    <div class="flex flex-col items-center justify-center">
        <h1>Nuevo trabajo</h1>
    <form class="w-full md:w-[50%] flex flex-col" action="{{route('job.create')}}" method="post">
        <input type="text" placeholder="name" name="name" id="name">
        <textarea type="text" placeholder="description" name="description" id="description"></textarea>
        <input type="text" list="categories" placeholder="category" name="category" id="category">
            <datalist id="categories">
                @foreach($categories as $category)
                    <option value="{{$category->nombre}}">
                @endforeach
            </datalist>  
        <input type="text" list="locations" placeholder="location" name="location" id="location">
        <datalist id="locations">
                @foreach($locations as $location)
                    <option value="{{$location->location}}">
                @endforeach
            </datalist>  
        <input type="text" placeholder="salary" name="salary" id="salary">
        <button class="btn-prm" type="submit">crear</button>
    </form>
    </div>
</body>
</html>