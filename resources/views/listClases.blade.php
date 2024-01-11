<!DOCTYPE html>
<html lang="es">
<head>
    <title>Listado de Clases</title>
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
    <div class="TargetTable">
        @auth
        <h2>Listado de Clases</h2>
        @if (Auth::user()->user_type == 'Admin')
            <div class="btnTable">
              <a href="{{ route('clase.create') }}"><button class="createBtn fa-solid fa-plus"> Crear clase</button></a>
            </div>
            <br>
            @if (count($clases)>0)
                <div style="overflow: auto;">
                    <table>
                      <tr>
                        <th>Nombre</th>
                        <th>Descripcion</th>
                        <th>Modificar</th>
                        <th>Eliminar</th>
                      </tr>
                      @foreach ($clases as $clase)
                        <tr>
                          <td>{{$clase['nombre']}}</td>
                          <td>{{$clase['descripcion']}}</td>
                          <td>
                            <a href="{{ route('clase.edit', $clase->id) }}"><button class="fa fa-pencil-square iconbuttonEdit"></button></a>
                          </td>
                          <td>
                            <form action="{{ route('clase.destroy', $clase->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this clase?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="fa fa-trash iconbutton iconbuttonDelete"></button>
                            </form>                    
                          </td>                  
                        </tr>                  
                      @endforeach                  
                    </table>
                </div>            
            @else
                <h5>No hay clases registradas.</h5>
            @endif
        @else
            @if (count(Auth::user()->clases)>0)
                <div style="overflow: auto;">
                    <table>
                      <tr>
                        <th>Nombre</th>
                        <th>Descripcion</th>
                      </tr>
                      @foreach (Auth::user()->clases as $clase)
                        <tr>
                          <td>{{$clase['nombre']}}</td>
                          <td>{{$clase['descripcion']}}</td>
                        </tr>
                      @endforeach
                    </table>
                </div>
            @else
                <h5>No tienes clases asignadas.</h5>
            @endif
        @endif
        @endauth
    </div>  
</body>
</html>
