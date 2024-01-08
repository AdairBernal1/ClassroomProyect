<body>
  <div class="topnav" id="myTopnav">
    <div>
      <a href="#home" class="active">Home</a>
      @auth
      <a href="/tareas">Tareas</a>
      <a href="#materiales">Materiales</a>
      <a href="#clases">Clases Asignadas</a>
      @csrf<a href="/cerrar-sesion">Cerrar Sesion</a>
      <a href="javascript:void(0);" class="icon" onclick="myFunction()">
        <i class="fa fa-bars"></i>
      </a>
      @endauth
    </div>
  </div>
</body>