<h1 class="nombre-pagina">Olvidé mi password</h1>
<p class="descripcion-pagina">Restablece tu password con tu E-mail</p>

<?php
    include_once __DIR__ . '/../templates/alertas.php';
?>

<form class="formulario" method = "POST" action="/olvide">
    <div class="campo">
        <label for="email">E-mail :</label>
        <input 
            type="email" 
            name="email" 
            id="email"
            placeholder="Tu email"
        />
    </div>


    <input type="submit" class="boton" value="Enviar instrucciones">
</form>
<div class="acciones">
    <a href="/">¿ Ya tienes una cuenta ? Iniciar session</a>
    <a href="/crear-cuenta">¿ Aún no tienes una cuenta ? Crear una</a>
</div>
<?php
        include_once __DIR__ . '/../templates/footer.php';
?>
