<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar cuenta</title>

    <link rel="stylesheet" href="comprueba-login_style.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
        $(function () {

            $("#boton_i").attr('disabled', true);


            $("#passw_old").keydown(() => {

               

                    $("#boton_i").attr('disabled', false);

                
            });



        });
    </script>

</head>

<body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" name='login' id='login'>
    <label for="usuario">Usuario:</label>
        <h3>nombre de usuario</h3>
        <!-- <?php echo $_SESSION['usuario']?> -->
        <label for="passw">Introduzca su contraseña:</label>
        <input type="password" name="passw_old" id="passw_old">

        <input type="submit" value="Eliminar cuenta" class="boton_form" name='boton_i' id="boton_i">
    </form>
    <?php
    
    if(isset($_POST['boton_i'])){
        echo "<div id='respuesta'>";
        include ('borrar.php');
        echo "</div>";
    }
    
    ?>
</body>

</html>