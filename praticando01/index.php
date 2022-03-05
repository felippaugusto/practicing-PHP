<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>praticando-PHP</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>praticando-PHP</h1>

    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
        <label for="name">NOME:</label>
        <input type="text" name="name" id="name">

        <label for="phoneNumber">NÚMERO:</label>
        <input type="number" name="phoneNumber" id="phoneNumber">

        <label for="email">EMAIL:</label>
        <input type="email" name="email" id="email">

        <label for="age">IDADE</label>
        <input type="text" name="age" id="age">

        <label for="adress">ENDEREÇO</label>
        <input type="text" name="adress" id="adress">

        <div class="container-button">
            <button type="submit" name="btnSubmit">ENVIAR</button>
        </div>
    </form>

<?php
    if(isset($_POST['btnSubmit'])){
        $errors = array();

        if(!$numero = filter_input(INPUT_POST, 'phoneNumber', FILTER_VALIDATE_INT)){
            $errors[] = "Formato de número incorreto!";
        }
        if(!$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL)){
            $errors[] = "Formato de EMAIL incorreto!";
        }
        if(!$idade = filter_input(INPUT_POST, 'age', FILTER_VALIDATE_INT)){
            $errors[] = "Digite sua idade corretamente usando apenas números inteiros";
        }

        if(!empty($errors)){
            foreach($errors as $erro){
                echo "<ul> <li>$erro</li> <ul>";
            }
        }
        else {
            echo "<h1>Parabéns, seus dados estão corretos</h1>";
        }
    }
?>
</body>
</html>