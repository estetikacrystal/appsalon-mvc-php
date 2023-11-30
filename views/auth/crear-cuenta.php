<h1 class="nombre-pagina">Crear cuenta</h1>
<p class="descripcion-pagina">Llena el siguiente formulario para crear una cuenta</p>
<?php
    include_once __DIR__ . '/../templates/alertas.php';
?>
<form action="/crear-cuenta" method="POST" class="formulario">
    <div class="campo">
        <label for="nombre">Nombre :</label>
        <input 
            type="text" 
            id="nombre" 
            name="nombre" 
            placeholder="Tu nombre" 
            required
            value="<?php echo s($usuario->nombre) ?>"
        />
    </div>
    <div class="campo">
        <label for="apellido">Apellido :</label>
        <input 
            type="text" 
            id="apellido" 
            name="apellido" 
            placeholder="Tu apellido" 
            required
            value="<?php echo s($usuario->apellido) ?>"
        />
    </div>
    <div class="campo">
        <label for="telefono">Teléfono :</label>
        <input 
            type="tel" 
            id="telefono" 
            name="telefono" 
            placeholder="Tu telefono" 
            required
            value="<?php echo s($usuario->telefono) ?>"
        />
    </div>
    <div class="campo">
        <label for="email">E-mail :</label>
        <input 
            type="email" 
            name="email" 
            id="email"
            placeholder="Tu email"
            value="<?php echo s($usuario->email) ?>"
            required
        />
    </div>

    <div class="campo">
        <label for="password">Password :</label>
        <input 
            type="password" 
            name="password" 
            id="password"
            placeholder="Tu password"
            required
        />
    </div>

    <input type="submit" class="boton" value="Crear cuenta">
</form>
<div class="acciones">
    <a href="/">¿ Ya tienes una cuenta ? Iniciar session</a>
    <a href="/olvide">¿ Olvidaste tu password ?</a>
</div>
<?php
        include_once __DIR__ . '/../templates/footer.php';
?>