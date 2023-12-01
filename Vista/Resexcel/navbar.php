<div class="zocalo">
    <div class="logo">
        <img src="Vista/Imagen/LogoBlancoG.jpg" alt="Logo del la Institución">      
    </div> 
    <div class="sesion">
        <?php
        echo 'SESIÓN: '.$_SESSION['rolide']['apellido'].' '.$_SESSION['rolide']['nombre'].'';?>
        <br>
        <?php
            echo 'ROL:  '.$_SESSION['rolide']['rol'].'';
            ?>          
    </div> 
</div>      