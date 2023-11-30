<h1 class="nombre-pagina"><?php echo $titulo; ?></h1>
<p class="descripcion-pagina">Tenemos varias Opciones a tu disposición</p>
<?php
    include_once __DIR__ . '/../templates/alertas.php';
?>
<section class="reservar">
    <div class="reservar reserva--bloque">
        <div class="icono">
            <img src="build/img/call.svg" alt="Icono Call-Center" loading="lazy">
            <h3 class="icono icono-sep">Agendar vía Telefonica</h3>
        </div>
        <p class="icono-texto">LLamanos 55 55 31 48 69</p>
        <div class="icono">
            <img src="build/img/whats.svg" alt="Icono Whats" loading="lazy">
            <h3 class="icono icono-sep">Agendar por WhatsApp</h3>
        </div>
        <p class="icono-texto">Escribenos 55 3224 3622</p>
        <div class="icono">
            <img src="build/img/email.svg" alt="E-mail" loading="lazy">
            <h3 class="icono icono-sep">Mandanos un Correo</h3>
        </div>
        <p class="icono-texto">nomadas21@hotmail.com</p>
        <div class="icono">
            <img src="build/img/registro.svg" alt="Icono Registro" loading="lazy">
            <h3 class="icono icono-sep">Agendar en Línea</h3>
           
        </div>
        <div class="icono-texto">
                <a class="icono-texto" href="/login">Registrarte aquí</a>
        </div>
    </div>
</section>

<?php
        include_once __DIR__ . '/../templates/footer.php';
?>
    

