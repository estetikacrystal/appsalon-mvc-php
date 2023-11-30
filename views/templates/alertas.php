<?php   
    foreach($alertas as $key => $msgs): 
        foreach($msgs as $msg):
?>
    <div class="alerta <?php echo $key; ?>" >
        <?php echo $msg; ?>
    </div>
<?php
        endforeach;
    endforeach;
?>