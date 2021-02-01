<?php
// session_start();
if(!isset($_SESSION['user'])){
    header('Location:index.php');
}
echo "Hola! ".$_SESSION['user'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>es solo para usuarios</h1>
    <?php
    

    ?>
</body>
</html>