

<?php



require ('conexionesBBDD.php');
$usu_entrar=$_POST['usuario'];
$contra_entrar=$_POST['contra'];
try{

    $miconexion=new PDO('mysql:host='.$base_host.';dbname='.$base_name.'',''.$base_usu.'',''.$base_contr.'');
    
    $miconexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    $miconexion->exec("SET CHARACTER SET utf8");

      
        $sql="SELECT * FROM USUARIOSGAME WHERE NOMBRE='$usu_entrar'";
        

        $resultado=$miconexion->prepare($sql);
        $resultado->execute();

        //Verifica si el usuario existe
        if($resultado->rowCount()==0){
            echo "El usuario no existe. <br>Intente de nuevo.";
        }else{

            while($registro=$resultado->fetch(PDO::FETCH_ASSOC)){
    
            $verificar=password_verify($contra_entrar,$registro['contra']);
            
            if($verificar){
                
                
                session_start();

                $_SESSION['user']=$_POST['usuario'];

                
                echo "<button id='iniciar'><a href='lectus.php'>Iniciar</a></button>";
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
