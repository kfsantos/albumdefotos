<?php
/**
 * Created by PhpStorm.
 * User: 72512113272
 * Date: 17/03/2017
 * Time: 11:08
 */
require_once("ende-banco.php");
var_dump($_POST['id']);
echo '<br>';

$album = selecionarAlbum($conexao, $_POST['id']);

if ( isset($_FILES[ 'arquivo' ][ 'name' ])) {


    $name 	= $_FILES['arquivo']['name']; //Atribui uma array com os nomes dos arquivos à variável
    $tmp_name = $_FILES['arquivo']['tmp_name']; //Atribui uma array com os nomes temporários dos arquivos à variável

    $allowedExts = array(".gif", ".jpeg", ".jpg", ".png", ".bmp"); //Extensões permitidas

    $dir = $album['enderecoalbum']."/";

    for($i = 0; $i < count($tmp_name); $i++) //passa por todos os arquivos
    {
        $extensao = strtolower(substr($name[$i],-4));

        if(in_array($extensao, $allowedExts)) //Pergunta se a extensão do arquivo, está presente no array das extensões permitidas
        {
            $new_name = date("Y.m.d-H.i.s") ."-". $i . $extensao;
            echo 'diretorio '; var_dump($dir); echo '<br>';
            echo 'diretorio temporario '; var_dump($name);echo '<br>';
            echo 'diretorio e nome '; var_dump($dir.$new_name);echo '<br>';
            @move_uploaded_file($name, $dir.$new_name );
            echo'Arquivo salvo';

        }
    }
}