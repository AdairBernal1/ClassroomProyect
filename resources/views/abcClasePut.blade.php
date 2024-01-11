<html lang="es">
<head>
    <title>Nueva Clase</title>
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
            <h2>Crear Clase</h2>
            <div>
                <form action="{{ route('clase.store') }}" method="POST">
                    @csrf
                    <input type="text" name="nombre" placeholder="Nombre"><br>
                    <input type="text" name="descripcion" placeholder="Descripcion"><br>
                    <button class="success">Crear</button>
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
