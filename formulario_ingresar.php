<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingreso</title>

    <link rel="stylesheet" href="../comprueba_login/comprueba-login_style.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="lectus 1.js"></script>
    <script>
        $(function () {

            $("#boton_i").attr('disabled', true);


            $("#contra").keydown(() => {

                let casilla_usu = $("#usuario").val();
                let casilla_passw = $("#contra").val();
                if (casilla_usu == "" || casilla_passw == "") {

                    $("#boton_i").attr('disabled', false);

                }
            });



        });
    </script>

</head>


<?php
    if(isset($_SESSION['user'])){

    
        header ('Location:../Lectus\lectus.php');

    }
    
    
    ?>
<body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" name='login' id='login'>
        <label for="usuario">Introduzca un nombre de usuario:</label>
        <input type="text" name="usuario" id="usuario">
        <label for="contra">Introduzca su contraseña:</label>
        <input type="password" name="contra" id="contra">

        <input type="submit" value="Aceptar" class="boton_form" name='boton_i' id="boton_i">
    </form>

</body>

</html>