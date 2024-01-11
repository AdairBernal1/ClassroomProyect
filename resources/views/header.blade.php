<body>
  <div class="topnav" id="myTopnav">
    <div>
      <a href="/" class="active">Home</a>
      @auth
      <a href="/tareas">Tareas</a>
      <a href="{{ route('clase.index') }}">Clases</a>
      <a href="{{ route('user.index') }}">Usuarios</a>
      @csrf<a href="/cerrar-sesion">Cerrar Sesion</a>
      <a href="javascript:void(0);" class="icon" onclick="myFunction()">
        <i class="fa fa-bars"></i>
      </a>
      @endauth
    </div>
  </div>
</body>