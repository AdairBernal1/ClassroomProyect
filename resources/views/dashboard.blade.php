<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/all.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="{{ asset('js/app.js')}}"></script>
</head>
<body>
    @include('header')
    @if (Auth::user()->user_type == 'Admin')
        <script type="text/javascript">
            function redirect() {
                window.location = "tareas";
            }
            window.onload = redirect;
        </script>        
    @else
        <script type="text/javascript">
            function redirect() {
                window.location = "";
            }
            window.onload = redirect;
        </script>    
    @endif
</body>
</html>