<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingreso</title>

    <link rel="stylesheet" href="comprueba-login_style.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
        $(function () {

            $("#boton_i").attr('disabled', true);


            $("#passw").keydown(() => {

                let casilla_usu = $("#usuario").val();
                let casilla_passw = $("#passw").val();
                if (casilla_usu == "" || casilla_passw == "") {

                    $("#boton_i").attr('disabled', false);

                }
            });



        });
    </script>

</head>

<body>
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" name='login' id='login'>
        <label for="usuario">Introduzca un nombre de usuario:</label>
        <input type="text" name="usuario" id="usuario">
        <label for="passw">Introduzca su contraseña:</label>
        <input type="password" name="passw" id="passw">

        <input type="submit" value="Ingresar" class="boton_form" name='boton_i' id="boton_i">
    </form>
    <?php
    
    if(isset($_POST['boton_i'])){
        echo "<div id='respuesta'>";
        include ('ingresar.php');
        echo "</div>";
    }
    
    ?>
</body>

</html>