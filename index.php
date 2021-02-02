<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>prueba de página principal</title>
    <link rel="stylesheet" href="comprueba-login_style.css">

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
    <script>
        window.jQuery || document.write(unescape('%3Cscript src="/js_folder/jquery-1.6.1.min.js"%3E%3C/script%3E'))
    </script>
    <script>
        $(function () {

            $("#config").click(() => {
                $("#lateral").toggle();

            });


        });
    </script>

    <link rel="stylesheet" href="comprueba-login_style.css">
    <style>
        #barra {
            text-align: right;
        }

        #lateral {
            background-color: lightskyblue;
            width: 400px;
            float: right;
            display: none;
            height: 100vh;
        }

        h3 {
            text-align: center;
        }

        #respuesta {
            margin: auto;
        }
    </style>

</head>


<body>
<?php
    
    if(isset($_POST['boton_i'])){
        //echo "<div id='respuesta'>";
        include ('ingresar.php');
        //echo "</div>";
    }
    
    ?>
    <h1>PAGINA DE INICIO</h1>

    <div id="barra">
        <a href="#" id="config">Configuración</a>
    </div>
    <div id="lateral">
    <a href="cerrar_sesion.php">Cerrar sesión</a>
    </div>
    
        
        <?php
    if(!isset($_SESSION['user'])){

    
        include ('formulario_ingresar.php');

    }else{

        include ('usuario.php');
}
    
    
    ?>
    

</body>

</html>