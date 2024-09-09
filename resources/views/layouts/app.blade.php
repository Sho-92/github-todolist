<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('title', 'To Do List App')</title>
        <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    </head>
    <body>
        <header class="header">
            <h1><a href="{{ route('tasks.index')}}">To Do List Application</a></h1>
        </header>

        <div class="wrapper">
        <main class="main-content">
            <div class="container">
                @yield('content')
            </div>

            <nav>
                <ul>
                    @if (!in_array(Route::currentRouteName(), ['tasks.create', 'tasks.edit']))
                        <li><a href="{{ route('tasks.create')}}" class="btn">Create a New Task</a></li>
                    @endif
                </ul>
            </nav>
        </main>

        <footer class="footer">
            <p>&copy; 2024 To Do List Application</p>
        </footer>
    </body>
</html>
