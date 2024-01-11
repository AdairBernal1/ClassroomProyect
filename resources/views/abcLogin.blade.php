<div class="TargetAbc">
<h2>Registrarse en Classroom</h2>
<div>
    <form action="{{ route('user.storeAdmin') }}" method="POST">
        @csrf
        <input type="text" name="email" placeholder="Correo Electronico"><br>
        <input type="text" name="username" placeholder="Nombre de Usuario"><br>
        <input type="text" name="password" placeholder="Contraseña"><br><br>
        <label for="user_type">Tipo de Usuario:</label><br>
            <select name="user_type">
                <option value="Admin">Administrador</option>
                <option value="Usuario">Usuario</option>
            </select><br>
        <button class="success">Registrarse</button>
    </form>
</div>
</div><br>
<div class="TargetAbc">
<h2>Iniciar Sesion</h2>
<div>
    <form action="/iniciar-sesion" method="POST">
        @csrf
        <input type="text" name="logusername" placeholder="Nombre de Usuario">
        <input type="text" name="logpassword" placeholder="Contraseña">
        <button class="success">Iniciar Sesion</button>
    </form>
</div>
</div>