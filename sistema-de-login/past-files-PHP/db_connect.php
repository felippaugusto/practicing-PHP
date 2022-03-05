<?php
// pegar as informações do banco de dados
// pegar o nome do servidor
$serverName = "localhost";
// pegar o login
$userName = "root";
$password = "";
// pegar o nome do banco de dados
$db_name = "sistemalogin";

$connectDB = mysqli_connect($serverName, $userName, $password, $db_name);

if(mysqli_connect_error()){
    echo "Falha na conexão: ". mysqli_connect_error();
}

?>