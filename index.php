<?php
//abrir um arquivo para escrita
echo "criando um arquivo<br>";
$f = fopen('arquivo.txt','w');

//emitindo falha
    if(!$f){
        die("falha");
    }

    //escrevendo
    for ($i=0; $i <50 ; $i++) { 
        fwrite($f,"texto escrito\n");
        echo "escreveu...<br>";
        # code...
    }

    //fechar
    fclose($f);

    //lendo o conteudo do arquivo
    $conteudo = file_get_contents('arquivo.txt');
    echo $conteudo;
    echo "fim.";

    //escrevendo no arquivo
    $lorem = ("lorem ipsum sad asd sad sad \n");
    echo (filesize('arquivo.txt'));
    file_put_contents('arquivo.txt',$lorem,FILE_APPEND);
?>