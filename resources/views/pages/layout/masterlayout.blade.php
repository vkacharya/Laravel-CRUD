<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>laravel blade practice</title>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
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
        <main>
            <article>
                <h1>
                    @hasSection ('title')
                    @yield('title','website pages')
                    @else
                    <h2>no content found</h2>

                    @endif
                </h1>
                @yield('content')
            </article>
            <aside>
                @section('sidebar')
                <ul>
                    <li><a href="">Home</a></li>
                    <li><a href="">About</a></li>
                    <li><a href="">Post</a></li>
                </ul>
                @show
            </aside>
        </main>
        <footer>yahoobaba@copyright 2023. </footer>
    </div>
    @stack('script')
</body>

</html>