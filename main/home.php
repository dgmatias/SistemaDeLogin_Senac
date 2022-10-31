<?php 

session_start();

if (!isset($_SESSION['id'])) {
    header ("Location: login.php");
    exit;
}

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <div> <h1>Logado</h1> </div>
    <div> <a href="logout.php"> Logout </a> </div>

</body>
</html>