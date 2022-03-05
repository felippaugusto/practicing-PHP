<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uploads de arquivos</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php
    if(isset($_POST['enviar-formulario'])){
        $formatosExtencoesPermitidos = array("jpg", "jpeg", "gif", "png", "svg");
        $contador = 0;
        $quantidadeArquivos = count($_FILES['file']['name']);

        while($contador < $quantidadeArquivos){
        $extensaoArquivo = pathinfo($_FILES['file']['name'][$contador], PATHINFO_EXTENSION);
        
        
        if(in_array($extensaoArquivo, $formatosExtencoesPermitidos)){
            $pasta = "arquivos/";
            $temporario = $_FILES['file']['tmp_name'][$contador];
            $newName = pathinfo($_FILES['file']['name'][$contador], PATHINFO_FILENAME) . ".$extensaoArquivo";

            
            if(move_uploaded_file($temporario, $pasta.$newName));{
                echo "<h1>Upload feito com sucesso para o diretório $pasta!</h1>";
            }

        }
        else if($_FILES['file']['name'][$contador] == ""){
            echo "<h1>Por favor, antes de enviar o formulário preencha o campo do arquivo!</h1>";
        }
        else {
            echo "<h1>Extensão não confiável!</h1>";
        }

        $contador++;

    }
}
?>

    <h1>Uploads de arquivos</h1>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
        <label for="arquivo">add file</label>
        <input type="file" name="file[]" multiple><br>
        <div class="container-button">
        <button type="submit" name="enviar-formulario">Enviar</button>
        </div>
    </form>
</body>
</html>