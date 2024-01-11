<html lang="es">
<head>
    <title>Registrar Nuevo Usuario</title>
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
    <a href="{{ url()->previous() }}" class="go-back-btn">←</a>
    <br>
    <div class="TargetAbc2">
        <h2>Crear Usuario</h2>
        <div>
            <form action="{{ route('user.store') }}" method="POST">
                @csrf
                <input type="text" name="username" placeholder="Username"><br>
                <input type="email" name="email" placeholder="Email"><br>
                <input type="password" name="password" placeholder="Password"><br>
                <select name="user_type">
                    <option value="Administrador">Administrador</option>
                    <option value="Usuario">Usuario</option>
                </select>
                <br>
                <input type="number" name="autism_lvl" placeholder="Autism Level"><br>
                <button class="success">Crear</button>
            </form>
        </div> 
    </div>  
</body>
