<?php
/**
 * Created by PhpStorm.
 * User: 72512113272
 * Date: 17/03/2017
 * Time: 11:08
 */
require_once("ende-banco.php");
require_once("redimensionar-imagem.php");

$album = selecionarAlbum($conexao, $_POST['id']);
$album_id = $album['id'];
$endereco = $album['enderecoalbum'];
echo "Album_id ";
var_dump($album_id);
echo "<br>";
echo "Endereco ";
var_dump($endereco);
echo "<br>";


foreach ($_FILES["foto"]["error"] as $key => $error) {
    if ($error == UPLOAD_ERR_OK) {
        //Recupera o endereco temporario do arquivo
        $tmp_name = $_FILES["foto"]["tmp_name"][$key];

        //Recupera o nome do arquivo
        $name = $_FILES["foto"]["name"][$key];

        //Recupera a extensao para realizar a comparacao
        $extensao = strrchr($name, '.');
        $novonome = md5(microtime()) . $extensao;
        var_dump($extensao);


        //Extensoes enfileiradas para comparar com o arquivo vindo do formulario
        if (strstr('.jpg;.jpeg;.gif;.png', $extensao)) {
            if (inserirFoto($conexao, $novonome, $album_id)) {             
                move_uploaded_file($tmp_name, $endereco . "/temporario/" . $novonome);
                redimencionarminiatura($conexao,$endereco, $novonome);
            } else {
                $msg = mysqli_error($conexao); ?>
                <p class="text - danger">O produto <?= $name ?> não foi adicionado: <?= $msg ?></p>
                <?php
            }

        } else {
            echo "<br>";
            echo "Extensão inválida!";
        }
    }
}
removerPastaTemporaria($endereco);



