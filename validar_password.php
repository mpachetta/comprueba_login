<?php
function validar_password($clave1,$clave2){

   if($clave1==$clave2){
            return true;
        }
        
    

}

function validar_long($clave1){

    $long=iconv_strlen($clave1);

    if($long>=4){
        return true;
    }
}

//luego debería agregar otros criterios de validación:largo de clave, uso de simbolos, maysuculas, numeros,etc


function validar_old($usu_actual, $clave_ant){
    //tengo que conectar con base de datos y hacer lo que hace ingresar.php



    try{
        require ('conexionesBBDD.php');
        $miconexion=new PDO('mysql:host='.$base_host.';dbname='.$base_name.'',''.$base_usu.'',''.$base_contr.'');
        
        $miconexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    
        $miconexion->exec("SET CHARACTER SET utf8");
    
          
            $sql="SELECT * FROM USUARIOSGAME WHERE NOMBRE='$usu_actual'";
            
    
            $resultado=$miconexion->prepare($sql);
            $resultado->execute();
    
            //Verifica si el usuario existe
            if($resultado->rowCount()==0){
                echo "El usuario no existe. <br>Intente de nuevo.";
            }else{
    
                while($registro=$resultado->fetch(PDO::FETCH_ASSOC)){
        
                $verificar=password_verify($clave_ant,$registro['contra']);
                
                if($verificar){
                    return true;
                }
            }
            }
    
            $resultado->closeCursor();
    
    }catch(Exception $e){
    
            die("Error: ".$e->getMessage());
            
    }finally{
    
        $base=null;
    
    }

}

?>