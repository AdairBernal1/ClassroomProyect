<html lang="es">
<head>
    <title>Editar Usuario</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/all.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="{{ asset('js/app.js')}}"></script>
</head>
<body>
    @include('header')
    <br>
    @if (Auth::user()->user_type == 'Admin')
        <div class="TargetAbc2">
            <div class="btnBack">
                <a href="{{ url()->previous() }}" class="go-back-btn">←</a>
            </div>
            <h2>Editar Usuario</h2>
            <div>
                <form action="{{ route('user.update', $user->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="text" name="username" value="{{ $user->username }}" placeholder="Username"><br>
                    <input type="email" name="email" value="{{ $user->email }}" placeholder="Email"><br>
                    <input type="password" name="password" placeholder="Password (leave blank to keep current password)"><br>
                    <input type="text" name="user_type" value="{{ $user->user_type }}" placeholder="User Type"><br>
                    <input type="number" name="autism_lvl" value="{{ $user->autism_lvl }}" placeholder="Autism Level"><br>
                    <button class="success">Actualizar</button>
                </form>
            </div> 
        </div>         
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
