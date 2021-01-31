<?php

require_once ('conexionesBBDD.php');
require ('validar_password.php');


// $n_usuario=$_SESSION['usuario'];
$n_usuario='martin';

$n_clave=$_POST["passw"];
$n_clave_rep=$_POST['passw_rep'];




$validacion_long_clave=validar_long($n_clave);

$validacion_clave=validar_password($n_clave,$n_clave_rep);



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
    
          
                    $sql="UPDATE USUARIOSGAME SET CONTRA='$pass_cifrado' WHERE NOMBRE='$n_usuario'";
            
    
                    $resultado=$miconexion->prepare($sql);
    
                    $tarea=$resultado->execute();
                               
    
                        if ($tarea==false){
                            echo ("Error en el registo. Vuelva a intentarlo.<br>");
                            echo "<p><a href='formulario_actualizar.php'>Intenta de nuevo</a></p>";
                        }else{
                            
            
                            echo "<p><a href='formulario_actualizar_apr.php'>Continuar</a></p>";
                        }
    
                    $resultado->closeCursor();
        
                }catch(Exception $e){
    
                    die("Error: ".$e->getMessage());
            
                }finally{
    
                    $base=null;
    
                }
    
            }

        



?>