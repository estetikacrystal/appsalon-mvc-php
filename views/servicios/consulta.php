<h1 class="nombre-pagina">Servicios</h1>
<p class="descripcion-pagina">Estética Krystal</p>

<ul class="servicios-m">
    <?php foreach($servicios as $servicio){ ?>
        <li>
            <p>Nombre: <span><?php echo $servicio->nombre; ?></span></p>
            <p>Precio: <span>$ <?php echo $servicio->precio; ?></span></p>
            <img class="imagen-tabla"" src="/imagenes/<?php echo $servicio->imagen ?>"  alt="Imagen Servicio"></td>
        </li>
    <?php } ?>
</ul>
<?php
        include_once __DIR__ . '/../templates/footer.php';
    ?>

