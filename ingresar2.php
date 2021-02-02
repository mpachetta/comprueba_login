

<?php

require ('conexionesBBDD.php');

try{

    $miconexion=new PDO('mysql:host='.$base_host.';dbname='.$base_name.'',''.$base_usu.'',''.$base_contr.'');
    
    $miconexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    $miconexion->exec("SET CHARACTER SET utf8");

    $usu_entrar=isset($_POST['usuario']) ? $_POST['usuario']:
    $_POST['usuario'];

    $contra_entrar=isset($_POST['contra']) ? $_POST['contra']:
    $_POST['contra'];
      
        $sql="SELECT * FROM USUARIOSGAME WHERE NOMBRE='$usu_entrar'";
        

        $resultado=$miconexion->prepare($sql);
        $resultado->execute();

        //Verifica si el usuario existe
        if($resultado->rowCount()==0){
            echo "El usuario ".$usu_entrar." no existe. <br>Intente de nuevo.";
        }else{

            while($registro=$resultado->fetch(PDO::FETCH_ASSOC)){
    
            $verificar=password_verify($contra_entrar,$registro['contra']);
            
            if($verificar){
                echo ('ok');
                echo '<a href="usuario.php">Entrar</a>';
                $_SESSION['user']=$usu_entrar;
            }else{

                echo "La contraseña es incorrecta. <br>Intente nuevamente.";
            }
        }
        }

        $resultado->closeCursor();

}catch(Exception $e){

        die("Error: ".$e->getMessage());
        
}finally{

    $base=null;

}


?>
