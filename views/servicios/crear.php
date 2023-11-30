<h1 class="nombre-pagina">Nuevo Servicio</h1>
<p class="descripcion-pagina">Llena los campos del formulario</p>

<?php
   // include_once __DIR__ . '/../templates/barra.php';
    include_once __DIR__ . '/../templates/alertas.php';
?>

<form action="/servicios/crear" method="POST" class="formulario" enctype="multipart/form-data">
    <?php
        include_once 'formulario.php';
    ?>
    <div class="acciones">
        <input type="submit" value="Guardar Servicio" class="boton">
        <a class="boton" href="/servicios">Regresar &raquo;</a>
    </div>
</form>