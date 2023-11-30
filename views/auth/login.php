<h1 class="nombre-pagina">Login</h1>
<p class="descripcion-pagina">Inicia sessión con tus datos</p>

<?php include_once __DIR__ . '/../templates/alertas.php'; ?>

<form class="formulario" method = "POST" action="/login">
    <div class="campo">
        <label for="email">E-mail</label>
        <input 
            type="email" 
            name="email" 
            id="email"
            placeholder="Tu email"
            value="<?php echo s($auth->email); ?>"
        />
    </div>

    <div class="campo">
        <label for="password">Password</label>
        <input 
            type="password" 
            name="password" 
            id="password"
            placeholder="Tu password"
        />
    </div>

    <input type="submit" class="boton" value="Iniciar session">
</form>

<div class="acciones">
    <a href="/crear-cuenta">¿ Aún no tienes una cuenta ? Crear una</a>
    <a href="/olvide">¿ Olvidaste tu password ?</a>
</div>
<?php
    include_once __DIR__ . '/../templates/footer.php';
?>
