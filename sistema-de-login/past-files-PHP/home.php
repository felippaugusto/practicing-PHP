<?php
require_once 'db_connect.php';
session_start();

if(!isset($_SESSION['logado'])){
    header('Location: index.php');
}

$id = $_SESSION['id_usuario'];
$sql = "SELECT * FROM usuarios WHERE id = '$id'";
$resultado = mysqli_query($connectDB, $sql);
$dados = mysqli_fetch_array($resultado);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME</title>
    <link rel="stylesheet" href="../past-files-styles/style-home.css">
</head>
<body>
        <img src="../images/image.jpg" alt="image" class="image">
        <h1>BEM VINDO <?php echo $dados['nome']; ?>!</h1>
        <a href="logout.php">SAIR</a>
</body>
</html>