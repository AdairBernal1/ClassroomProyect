<body>
  <div class="topnav" id="myTopnav">
    <div>
      <a href="#home" class="active">Home</a>
      @auth
      <a href="#tareas">Tareas</a>
      <a href="#materiales">Materiales</a>
      <a href="#clases">Clases Asignadas</a>
      <a><form action="/cerrar-sesion" method="POST">@csrf<button>Cerrar Sesion</button></form></a>
      @endauth
    </div>
  </div>
</body>