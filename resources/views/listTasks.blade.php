<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Classroom</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <script src="{{ asset('js/app.js')}}"></script>
</head>

<body>
    @include('header')
    <br>
    <div class="TargetTable">
        @auth
        <h2>Listado de Tareas</h2>
        @if (Auth::user()->user_type == 'Admin')
            <div class="btnTable">
              <a href="crear-task"><button class="createBtn fa-solid fa-plus"> Crear tareas</button></a>
            </div>
            <br>
            @if (count($Tasks)>0)
                <div style="overflow: auto;">
                    <table>
                      <tr>
                        <th>Titulo</th>
                        <th>Descripcion</th>
                        <th>Nivel de dificultad</th>
                        <th>Imagen</th>
                        <th>Modificar</th>
                        <th>Eliminar</th>
                        <th>Clase</th>
                      </tr>
                      @foreach ($Tasks as $task)
                        <tr>
                          <td>{{$task['title']}}</td>
                          <td>{{$task['description']}}</td>
                          <td>{{$task['autism_lvl']}}</td>
                          <td>
                            <img class="responsive-image" src="{{ asset('public/src/images/' . $task['pathImg']) }}" onclick="onClick(this)">
                          </td>
                          <td><a href="/modificar-task/{{$task['id']}}"><button class="fa fa-pencil-square iconbuttonEdit"></button></a></td>
                          <td><a href="/eliminar-task/{{$task['id']}}"><button class="fa fa-trash iconbutton iconbuttonDelete"></button></a></td>
                          <td>
                            @foreach ($task->clases as $clase)
                              {{$clase->nombre}}
                            @endforeach
                          </td>
                        </tr>                  
                      @endforeach                  
                    </table>
                </div>
            @else
                <h5>Lista de tareas vacia.</h5>
            @endif
        @else
            @if (count($Tasks)>0)
                <div style="overflow: auto;">
                    <table>
                      <tr>
                        <th>Titulo</th>
                        <th>Descripcion</th>
                        <th>Nivel de dificultad</th>
                        <th>Imagen</th>
                        <th>Clase</th>
                      </tr>
                      @foreach ($Tasks as $task)
                        <tr>
                          <td>{{$task['title']}}</td>
                          <td>{{$task['description']}}</td>
                          <td>{{$task['autism_lvl']}}</td>
                          <td>
                            <img class="responsive-image" name src="{{ asset('public/src/images/' . $task['pathImg']) }}" onclick="onClick(this)">
                          </td>
                          <td>
                            @foreach ($task->clases as $clase)
                              {{$clase->nombre}}
                            @endforeach
                          </td>
                        </tr>                  
                      @endforeach                  
                    </table>
                </div>
            @else
                <h5>No tienes tareas asignadas.</h5>
            @endif
        @endif
        @endauth
    </div>  
    <div style="text-align: center" id="modal01" class="w3-modal" onclick="this.style.display='none'">
      <img class="w3-modal-content" id="img01" style="width:20%;border-radius: 10px">
    </div>
</body>
<script>
  function onClick(element) {
    document.getElementById("img01").src = element.src;
    document.getElementById("modal01").style.display = "block";
  }
</script>
</html>
