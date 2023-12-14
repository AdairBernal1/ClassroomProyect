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
    <div class="TargetTable">
        <h2>Listado de Tareas</h2>
        <div class="btnTable">
          <a href="crear-tarea"><button class="createBtn fa-solid fa-plus"> Crear tareas</button></a>
        </div>
        <br>
        <div style="overflow-x: auto;">
            <table>
              <tr>
                <th>Titutlo</th>
                <th>Descripcion</th>
                <th>Nivel de dificultad</th>
                <th>Modificar</th>
                <th>Eliminar</th>
              </tr>
              @foreach ($Tasks as $task)
                <tr>
                  <td>{{$task['title']}}</td>
                  <td>{{$task['description']}}</td>
                  <td>{{$task['autism_lvl']}}</td>
                  <td><a href=""><button class="fa fa-pencil-square iconbuttonEdit"></button></a></td>
                  <td><a href=""><button class="fa fa-trash iconbutton iconbuttonDelete"></button></a></td>                  
                </tr>                  
              @endforeach                  
            </table>
          </div>
    </div>  
</body>
