<div class="campo">
    <label for="nombre">Nombre: </label>
    <input 
        id="nombre"
        type="text" 
        placeholder="Nombre servicio" 
        name="nombre"
        value="<?php echo $servicio->nombre ?>"
        
    />
</div>
<div class="campo">
    <label for="precio">Precio: </label>
    <input 
        id="precio"
        type="number" 
        placeholder="Precio servicio" 
        name="precio"
        value="<?php echo $servicio->precio ?>" 
    />
</div>
<div class="campo">
    <label for="imagen">Imagen: </label>
    <input type="file" id="imagen" name="imagen" accept="image/jpeg, image/png">

    <?php if($servicio->imagen) {?>
        <img src="/imagenes/<?php echo $servicio->imagen ?>" class="imagen-small" alt="Imagen Servicio small">
    <?php  }?>

</div>
<div class="campo">
    <label for="Promoción">Promoción: </label>
    <input 
        class="campo chek" 
        type="checkbox" 
        id="promocion" 
        name="promocion"
        value =""
    />
</div>