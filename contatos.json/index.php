<?php
    //definindo uma constante para o nome do arquivo
    define('ARQUIVO','contatos.json');

    //funcao para validar dados do post
    function errosNoPost(){
        $erros = [];
        if(!isset($_POST['nome']) || $_POST['nome']=='' ){
            $erros[] = 'errNome';
        }
        if(!isset($_POST['email']) || $_POST['email']=='' ){
            $erros[] = 'errEmail';
        }

        return $erros;
    }


    //carregando o conteudo do arquivo(string json) para a variavel
    function getContatos(){
        $json = file_get_contents(ARQUIVO);
        $contatos = json_decode($json,true);
        return $contatos;
    }

    //function q add contato json
    function addContatos($nome,$email){
        //carregando os contatos
        $contatos = getContatos();

        //add um novo contato ao array de contatos
        $contatos[] = [
            'nome' => $nome,
            'email' => $email
        ];

        //transformar o array contatos nume string json
        $json = json_encode($contatos);

        //salvar a string json no arquivo
        file_put_contents(ARQUIVO,$json);
    }

    // if (!$_POST == '') {
    //     # code...
    //     echo "preencha os campos";
    // } else {
        $erros = errosNoPost();

        if($_POST){
            //verificando o post

            if(count($erros) ==0){
                //add o contato ao arquivo json
                addContatos($_POST['nome'],$_POST['email']);
            }

        }else {
            $erros = [];
        }

    //}
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


    <form action="index.php" method="POST">
        <input <?php echo (in_array('errNome',$erros)?'style="border:red 1px solid"' : ''); ?> type="text" name="nome" id="nome" placeholder="digite o nome">
        <input type="email" name="email" id="email" placeholder="digite o email">
        <button type="submit">Salvar</button>
    </form>

</body>

</html>