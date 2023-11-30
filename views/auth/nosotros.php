
<h1 class="nombre-pagina"><?php echo $titulo; ?></h1>

    <div class="nosotros">
        <picture class="nosotros--imagen">
            <source srcset="build/img/images.webp" type="image/webp">
            <source srcset="build/img/images.jpeg" type="image/jpeg">
            <img loading="lazy" src="build/img/images.jpg" alt="Imagen Logo">
        </picture>
    </div>

    <div class="texto-entrada">
        <blockquote>
            Somos una empresa dedicada a la belleza, posicionadas en la zona de Polanco con más de 20 años de 
            experiencia, en nuestro salón que es un lugar super acogedor y tranquilo, brindamos un servicio 
            integral y personalizado a nuestras clientas, clientas que además de dedicar tiempo a su arreglo 
            y belleza, pueden seguir trabajando ya que sabemos que después de la pandemia trabajan más 
            mediante la computadora, lo pueden hacer aquí sin interrupciones y en total calma, 
            contamos con un horario de 7:30 am a 4:00 pm, para quienes quieren comenzar su día de trabajo 
            con un buen alaciado express, o el servicio que deseen, tenemos manicura, pedicura, cortes, tintes,
            cualquier diseño de color, desde un diseño discreto hasta un balayage, maquillaje y peinado para 
            todo tipo de eventos bodas,  XV años, graduaciones, gelish, laminado de cejas, lifting lashes con 
            color, botox super hidratante para el cabello, alaciado permanente con un producto directamente traído 
            desde Brasil, que además de alaciar, nutre y da brillo al cabello, así que para pedir informe y agendar 
            citas, puedes registrarte con nosotros o comunicarte con nosotros a través de nuestro WhatsApp, 
            redes sociales, Facebook e Instagram!! y si lo prefieres vía telefónica
        </blockquote>
    </div>

    <?php
        include_once __DIR__ . '/../templates/footer.php';
    ?>

