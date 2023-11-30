<h1 class="nombre-pagina">Actualizar Servicios</h1>
<p class="descripcion-pagina">Modifica los valores del formulario</p>

<?php
    include_once __DIR__ . '/../templates/barra.php';
    include_once __DIR__ . '/../templates/alertas.php';
?>

<form method="POST" class="formulario" enctype="multipart/form-data" >
    <?php
        include_once 'formulario.php';
    ?>
    <div class="acciones">
        <input type="submit" value="Actualizar Servicio" class="boton">
        <a class="boton" href="/servicios">Regresar &raquo;</a>    
    </div>
    
</form>