<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Classroom</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/all.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="{{ asset('js/app.js')}}"></script>
</head>

<body>
    @include('header')
    <br>
    <div class="TargetAbc2">
        <h2>Modificar Tarea</h2>
        <div>
            <form action="/registrar-task" method="POST">
                @csrf
                <input type="text" name="title" placeholder="Titulo"><br>
                <input type="text" name="description" placeholder="Descripcion"><br>
                <label for="autism_lvl">Nivel de autismo:</label><br>
                    <select name="autism_lvl">
                        <option value="1">Nivel 1</option>
                        <option value="2">Nivel 2</option>
                    </select><br>
                <button class="success">Modificar</button>
            </form>
        </div> 
    </div>  
</body>


