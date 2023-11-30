<head>
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
            integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
            crossorigin=""/>
        <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
            integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
            crossorigin=""></script>
        <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js" defer></script>
        <h1 class="nombre-pagina"><?php echo $titulo; ?></h1>

        <div class="derecha">
            <nav class="navegacion">
                <a href="/nosotros">Nosotros</a>
                <a href="/login">Iniciar Session</a>
                <a href="/blog">Blog</a>
                <a href="/reservar">Reservar Cita</a>
                <a href="/servicios/consultar">Servicios</a>
            </nav>
        </div>
        <p class="descripcion-pagina">Estilo es Belleza</p>
</head>

<body>
    <article class="entrada-blog">
        <picture class="centrar" >
            <source srcset="build/img/logo.webp" type="image/webp">
            <source srcset="build/img/logo.jpeg" type="image/jpeg">
            <img class="img" loading="lazy" src="build/img/logo.jpg" alt="Imagen Logo">
        </picture>

        <div class="texto-entrada">
            <a href="#">
                <h4>Ven y dejate consentir</h4>
                <p>Más de <span>20 años de Experiencia</span> en Servicio de Belleza</p>

                <p>
                    Apuesta por un look que exprese quién eres, no se trata de lucir perfecta.
                    Se trata de ser <span>Única</span>.     
                </p>
            </a>
        </div>
    </article>

    <div id="mapa" class="mapa"></div>

    <?php
        include_once __DIR__ . '/../templates/footer.php';
    ?>
    
</body>
<?php
    $script = "<script src='build/js/mapa.js'></script>"
?>