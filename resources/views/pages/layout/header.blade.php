{{-- <h1>header page</h1>
<h1>{{$name}}</h1> --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>laravel blade practice</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div id="wrapper">
        <header>
            <h1>YahooBaba</h1>
        </header>
        <nav>
            <a href="{{route('home')}}">Home</a> |
            <a href="{{route('about')}}">About</a> |
            <a href="{{route('post')}}">Post</a>
        </nav>