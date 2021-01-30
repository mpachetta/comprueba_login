<?php


function validar_usuario($n_usu){
     
try{

require ('conexionesBBDD.php');

$miconexion=new PDO('mysql:host='.$base_host.';dbname='.$base_name.'',''.$base_usu.'',''.$base_contr.'');
    
$miconexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$miconexion->exec("SET CHARACTER SET utf8");

      
        $sql="SELECT NOMBRE FROM USUARIOSGAME WHERE NOMBRE='$n_usu'";
        

        $resultado=$miconexion->prepare($sql);

        $resultado->execute();
        
        $coincidencia=$resultado->rowCount();
       

        if ($coincidencia==0){
            return true;
            
        }

        $resultado->closeCursor();

}catch(Exception $e){

        die("Error: ".$e->getMessage());
        
}finally{

    $base=null;

}

}


?>