<?php
    //definindo uma constante para o nome do arquivo
    define('ARQUIVO','contatos.json');

    //carregando o conteudo do arquivo(string json) para a variavel
    function getContatos(){
        $json = file_get_contents(ARQUIVO);
        $contatos = json_decode($json,true);
        return $contatos;
    }

    $contatos = getContatos();

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <ul>
        <?php foreach($contatos as $c): ?>
        <li>
            <span><?= $c['nome']; ?></span>:
            <span><?= $c['email']; ?></span>
        </li>
        <?php endforeach; ?>
    </ul>


    <form action="index.php">
        <input type="text" name="nome" id="nome" placeholder="digite o nome">
        <input type="email" name="email" id="email" placeholder="digite o email">
        <button type="submit">Salvar</button>
    </form>

</body>

</html>