<html lang="es">
<head>
    <title>Listado de Alumnos</title>
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
        <h2>Listado de Usuarios</h2>
        <div class="btnTable">
          <a href="{{ route('user.create') }}"><button class="createBtn fa-solid fa-plus"> Crear usuario</button></a>
        </div>
        <br>
        @if (count($users)>0)
          <div style="overflow: auto;">
            <table>
              <tr>
                <th>Username</th>
                <th>Email</th>
                <th>User Type</th>
                <th>Autism Level</th>
                <th>Modificar</th>
                <th>Eliminar</th>
              </tr>
              @foreach ($users as $user)
                <tr>
                  <td>{{$user->username}}</td>
                  <td>{{$user->email}}</td>
                  <td>{{$user->user_type}}</td>
                  <td>{{$user->autism_lvl}}</td>
                  <td>
                    <form method="GET">
                      <a href="{{ route('user.edit', $user->id) }}"><button class="fa fa-pencil-square iconbuttonEdit"></button></a>
                    </form>
                  </td>
                  <td>
                    <form action="{{ route('user.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?');">
                      @csrf
                      @method('DELETE')
                      <a><button type="submit" class="fa fa-trash iconbutton iconbuttonDelete"></button></a>
                    </form>
                  </td>                  
                </tr>                  
              @endforeach                  
            </table>
          </div>            
        @else
          <h5>Lista de usuarios vacia</h5>   
        @endif
    </div>  
</body>
