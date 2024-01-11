<body>
  <div class="topnav" id="myTopnav">
    <div>
      <a href="/dashboard" class="active">Home</a>
      @auth
      @if (Auth::user()->user_type == 'Admin')
        <a href="/tareas">Tareas</a>
        <a href="{{ route('clase.index') }}">Clases</a>
        <a href="{{ route('user.index') }}">Usuarios</a>
      @endif
      @csrf
      <a href="/cerrar-sesion">Cerrar Sesion</a>
      <a>Nivel de permisos: {{Auth::user()->user_type}}</a>
      <a href="javascript:void(0);" class="icon" onclick="myFunction()">
        <i class="fa fa-bars"></i>
      </a>
      @endauth
    </div>
  </div>
</body>