<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>

<link rel="stylesheet" href="comprueba-login_style.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    $(function () {

        $("#boton").attr('disabled', true);

        $("#passw_rep").keydown(() => {

            let casilla_usu = $("#usuario").val();
            let casilla_passw = $("#passw").val();
            let casilla_passw_rep = $("#passw_rep").val();

            if (casilla_usu != "" || casilla_passw != "" || casilla_passw_rep!="") {

                $("#boton").attr('disabled', false);

            }
        });



    });
</script>
</head>
<body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" name='login' id='login'>
        <label for="usuario">Introduzca un nombre de usuario:</label>
        <input type="text" name="usuario" id="usuario">
        <label for="passw">Introduzca una contraseña:</label>
        <input type='password' name="passw" id="passw">
        <label for="passw_rep">Repita la contraseña:</label>
        <input type="password" name="passw_rep" id="passw_rep">
        <input type="submit" name='boton' class="boton_form" id="boton" value="Registrarse">
        
    </form>
    <?php
    
    if(isset($_POST['boton'])){
        echo "<div id='respuesta'>";
        include ('registrar.php');
        
        echo "</div>";
    }
    
    ?>
</body>
</html>