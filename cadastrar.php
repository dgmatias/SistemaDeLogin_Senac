<?php 

require 'head.php';

session_start();

if (isset($_SESSION['id'])) {
    header ("Location: home.php");
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

    <div class="container">

        <div> <h1> Cadastrar </h1> </div>

        <div>

            <form method="post" action="cadastrar_action.php">

                <label for="">
                    Nome: <br>
                    <input type="text" name="nome"> 
                </label> <br>

                <label for="">
                    E-mail: <br>
                    <input type="email" name="email"> 
                </label> <br>

                <label for="">
                    Senha: <br>
                    <input type="password" name="senha"> 
                </label> <br>

                <label for="">
                    Confirmar a Senha: <br>
                    <input type="password" name="confirmar_senha"> 
                </label> <br>

                <label for=""> <br>
                    <input type="submit" value="adicionar"> 
                </label> <br>

            </form>

        </div>

    </div>


</body>
</html>