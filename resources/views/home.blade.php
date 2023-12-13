<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Classroom</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <script src="{{ asset('js/app.js')}}"></script>
    
</head>
<body>

    @auth

    <h1>YOU ARE LOGGED IN</h1>
    <form action="/cerrar-sesion" method="POST">
        @csrf
        <button>Cerrar Sesion</button>
    </form>
    
    @else
    @include('menu')
    <div>
        <h2>Registrarse en Classroom</h2>
        <div>
            <form action="/registrar-usuario" method="POST">
                @csrf
                <input type="text" name="email" placeholder="Correo Electronico">
                <input type="text" name="username" placeholder="Nombre de Usuario">
                <input type="text" name="password" placeholder="Contraseña">
                <label for="user_type">Tipo de Usuario:</label>
                    <select name="user_type">
                        <option value="Admin">Administrador</option>
                        <option value="User">Usuario</option>
                    </select>
                <button>Registrarse</button>
            </form>
        </div>
    </div>
    <div>
        <h2>Iniciar Sesion</h2>
        <div>
            <form action="/iniciar-sesion" method="POST">
                @csrf
                <input type="text" name="logusername" placeholder="Nombre de Usuario">
                <input type="text" name="logpassword" placeholder="Contraseña">
                <button>Iniciar Sesion</button>
            </form>
        </div>
    </div>

    @endauth

</body>
</html>