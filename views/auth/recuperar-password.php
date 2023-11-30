<h1 class="nombre-pagina">Reestablecer Password</h1>
<p class="descripcion-pagina">Digita tu nuevo password a continuacion</p>

<?php include_once __DIR__ . '/../templates/alertas.php'; ?>

<!-- Con esto se sale del Formulario OJO -->
<?php if($error) return; ?>

<form class="formulario" method = "POST">
    <div class="campo">
        <label for="password">Password</label>
        <input 
            type="password" 
            name="password" 
            id="password"
            placeholder="Tu password"
        />
    </div>

    <input type="submit" class="boton" value="Reestablecer Password">
</form>

<div class="acciones">
    <a href="/">Iniciar session</a>
</div>
<?php
        include_once __DIR__ . '/../templates/footer.php';
?>