<?php 

session_start();

ob_start();

require 'head.php';
require 'config.php';

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if(!empty($dados['SendLogin'])) {
    $sql = $pdo->prepare("SELECT * FROM tbl_login where email = :email");
    $sql->bindParam(':email', $dados['email'], PDO::PARAM_STR);
    $sql->execute();

    if (($sql) && ($sql->rowCount() != 0)) {
        $resultado = $sql->fetch(PDO::FETCH_ASSOC);
    
        if (password_verify($dados['senha'], $resultado['senha'])) {
            $_SESSION['id'] = $resultado['id'];
            $_SESSION['nome'] = $resultado['nome'];
            header('Location: home.php');
            exit;
        } else {
            $_SESSION['msg'] = "<p> Usuário ou senhas incorretas </p> ";
        }
    } else {
        $_SESSION['msg'] = "<p> Usuário ou senhas incorretas </p> ";
    }

    if(isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
} 

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

        <div> <h1> Login </h1> </div>

        <div>

            <form method="post" action="">

                <label for="">
                    Digite seu e-mail: <br>
                    <input type="email"
                    name="email"
                    value="<?php if(isset($dados['email'])){ echo $dados['email']; } ?>"
                     > 
                </label> <br>

                <label for="">
                    Digite sua senha: <br>
                    <input type="password" name="senha"> 
                </label> <br>

                <label for=""> <br>
                    <input type="submit" value="adicionar" name="SendLogin"> 
                </label> <br>

            </form>

        </div>

        <div> <a href="cadastrar.php"> Cadastrar </a> </div>

    </div>


</body>
</html>
</body>
</html>