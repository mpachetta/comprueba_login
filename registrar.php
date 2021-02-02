<?php

require_once ('conexionesBBDD.php');
require ('validar_password.php');
require ('validar_usuario.php');

$n_usuario=$_POST["usuario"];
$n_clave=$_POST["passw"];
$n_clave_rep=$_POST['passw_rep'];

$validacion_usuario=validar_usuario($n_usuario);

$validacion_long_clave=validar_long($n_clave);

$validacion_clave=validar_password($n_clave,$n_clave_rep);

if($n_usuario==""){
    echo "No ha introducido ningún nombre de usuario";
}else{


    if ($validacion_usuario!=true) {
        echo ("El usuario ya existe.<br> Intente con otro nombre de usuario.<br>");
    }else{

        if($validacion_long_clave!=true){
            echo "La clave debe tener 4 o más caracteres.";
        }else if($validacion_clave!=true){

             
                echo "Las contraseñas no coinciden.<br>Vuelva a intentarlo";

        }else{
    
            $pass_cifrado=password_hash($n_clave,PASSWORD_DEFAULT);
    
                try{
    
                    $miconexion=new PDO('mysql:host='.$base_host.';dbname='.$base_name.'',''.$base_usu.'',''.$base_contr.'');
    
                    $miconexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    
                    $miconexion->exec("SET CHARACTER SET utf8");
    
          
                    $sql="INSERT INTO USUARIOSGAME(NOMBRE,CONTRA) VALUES('$n_usuario','$pass_cifrado')";
            
    
                    $resultado=$miconexion->prepare($sql);
    
                    $tarea=$resultado->execute();
                               
    
                        if ($tarea==false){
                            echo ("Error en el registo. Vuelva a intentarlo.<br>");
                            echo "<p><a href='formulario_registrar.php'>Intenta de nuevo</a></p>";
                        }else{
                            echo("Felicitaciones $n_usuario. Registro exitoso.<br><br>");
            
                            echo "<p><a href='../Lectus\index.php'>Continuar</a></p>";
                        }
    
                    $resultado->closeCursor();
        
                }catch(Exception $e){
    
                    die("Error: ".$e->getMessage());
            
                }finally{
    
                    $base=null;
    
                }
    
            }

        }
}

//TAREAS:
//en registro, no permitir que haya usuarios con el mismo nombre
//usar sesion()
//en registro, poner dos vecves la contraseña


?>