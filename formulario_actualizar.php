<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualización de clave</title>

<link rel="stylesheet" href="comprueba-login_style.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    $(function () {

        $("#boton1").attr('disabled', true);


        

        $("#passw_old").keydown(() => {

 

                $("#boton1").attr('disabled', false);

            
        });



    });
</script>
</head>
<body>
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" name='passw-ant' id='passw_ant'>
        <label for="usuario">Usuario:</label>
        <h3>nombre de usuario</h3>
        <!-- <?php echo $_SESSION['usuario']?> -->
        <label for="passw_old">Introduzca la contraseña actual:</label>
        <input type='password' name="passw_old" id="passw_old">

        <input type="submit" name='boton1' class="boton_form" id="boton1" value="Aceptar">
        
    </form>

    <?php
    
    if(isset($_POST['boton1'])){
        echo "<div id='respuesta'>";
        include ('verificar_passw.php');
        
        echo "</div>";
    }
    
    ?>

    
</body>
</html>