

<?php
require ('conexionesBBDD.php');
require ('validar_password.php');
$n_usuario='lucas';
//$_POST['usuario'];
$contra_entrar=$_POST['passw_old'];
$validar_clave=validar_old($n_usuario, $contra_entrar);


if($validar_clave!=true){

    echo "La clave no es correcta. Vuelva a intentarlo.";

}else{


try{

    $miconexion=new PDO('mysql:host='.$base_host.';dbname='.$base_name.'',''.$base_usu.'',''.$base_contr.'');
    
    $miconexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    $miconexion->exec("SET CHARACTER SET utf8");

      
        $sql="DELETE FROM USUARIOSGAME WHERE NOMBRE='$n_usuario'";
        

        $resultado=$miconexion->prepare($sql);
        $resultado->execute();

        //Verifica si se produjo la consulta
        if($resultado->rowCount()==0){
            echo "No se pudo eliminar. <br>Intente de nuevo.";
        }else{

            echo "Usuario eliminado";
        }

        $resultado->closeCursor();

}catch(Exception $e){

        die("Error: ".$e->getMessage());
        
}finally{

    $base=null;

}
}

?>
