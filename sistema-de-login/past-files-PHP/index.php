<?php
require_once 'db_connect.php';

session_start();

if(isset($_POST['btnSubmit'])){
    $erros = array();
    // ele verifica se há caracteres especiais no login e password
    $login = mysqli_escape_string($connectDB, $_POST['login']);
    $password = mysqli_escape_string($connectDB, $_POST['password']);

    if(empty($login) || empty($password)){
        $erros[] = "<ul><li>Por favor, preenche todos os campos!</li></ul>";
    }
    else {
        $sql = "SELECT login FROM usuarios WHERE login = '$login'";
        
        $resultado = mysqli_query($connectDB, $sql);

        if(mysqli_num_rows($resultado) > 0){
            $password = md5($password);

            $sql = "SELECT * FROM usuarios WHERE login = '$login' AND password = '$password'";

            $resultado = mysqli_query($connectDB, $sql);

            if(mysqli_num_rows($resultado) > 0){
                $dados = mysqli_fetch_array($resultado);

                mysqli_close($connectDB);
                $_SESSION['logado'] = true;
                $_SESSION['id_usuario'] = $dados['id'];

                header('Location: home.php');

            }
            else {
                $erros[] = "<ul><li>Sua senha está incorreta!</li></ul>";
            }
            


        }
        else {
            $erros[] = "<ul><li>Seu login/senha está incorreto!</li></ul>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="../past-files-styles/style-index.css">
</head>
<body>
    <div class="container-center">
    <h1>Login</h1>

    <div class="container-erros-form">
    <?php 
        if(!empty($erros)){
            foreach($erros as $erro){
                echo "$erro";
            }
        }
    ?>

    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
        <label for="login">Login: </label>
        <input type="text" name="login" id="login" placeholder="Digite seu login">

        <label for="password">password: </label>
        <input type="password" name="password" id="password" placeholder="Digite sua senha">

        <button type="submit" name="btnSubmit">Enviar</button>
    </form>

    </div>
    </div>
</body>
</html>