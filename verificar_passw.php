<?php

require_once ('conexionesBBDD.php');
require ('validar_password.php');


// $n_usuario=$_SESSION['usuario'];
$n_usuario='magdalena';
$n_clave_old=$_POST['passw_old'];



$validar_clave_old=validar_old($n_usuario, $n_clave_old);



if($validar_clave_old!=true){
    echo "La contraseña es incorrecta. <br>Intente nuevamente.";
}else{
    echo "<p><a href='formulario_actualizar_apr.php'>Continuar</a></p>";
}


?>