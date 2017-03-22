<?php
/**
 * Created by PhpStorm.
 * User: 72512113272
 * Date: 17/03/2017
 * Time: 11:08
 */
require_once("ende-banco.php");

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
                move_uploaded_file($tmp_name, $endereco . "/" . $novonome);
            } else {
                $msg = mysqli_error($conexao); ?>
                <p class="text - danger">O produto <?= $name ?> não foi adicionado: <?= $msg ?></p>
                <?php
            }
        }

    } else {
        echo "<br>";
        echo "Extensão inválida!";
    }

}






/*

if(isset($_FILES['foto']['name']) && $_FILES["foto"]["error"] == 0)
{
    echo "Você enviou o foto: <strong>" . $_FILES['foto']['name'] . "</strong><br />";
    echo "Este foto é do tipo: <strong>" . $_FILES['foto']['type'] . "</strong><br />";
    echo "Temporáriamente foi salvo em: <strong>" . $_FILES['foto']['tmp_name'] . "</strong><br />";
    echo "Seu tamanho é: <strong>" . $_FILES['foto']['size'] . "</strong> Bytes<br /><br />";

    $foto_tmp = $_FILES['foto']['tmp_name'];
    $nome = $_FILES['foto']['name'];

    // Pega a extensao
    $extensao = strrchr($nome, '.');

    // Converte a extensao para mimusculo
    $extensao = strtolower($extensao);

    // Somente imagens, .jpg;.jpeg;.gif;.png
    // Aqui eu enfilero as extesões permitidas e separo por ';'
    // Isso server apenas para eu poder pesquisar dentro desta String
    if(strstr('.jpg;.jpeg;.gif;.png', $extensao))
    {
        // Cria um nome único para esta imagem
        // Evita que duplique as imagens no servidor.
        $novoNome =  date('d-m-Y-H-i-s'). $extensao;

        // Concatena a pasta com o nome
        $destino = $endereco."/" . $novoNome;

        // tenta mover o foto para o destino
        if( @move_uploaded_file( $foto_tmp, $destino  ))
        {

            echo "foto salvo com sucesso em : <strong>" . $destino . "</strong><br />";
            echo "<img src='' . $destino . '' />";
        }
        else
            echo "Erro ao salvar o foto. Aparentemente você não tem permissão de escrita.<br />";
    }
    else
        echo "Você poderá enviar apenas fotos '*.jpg;*.jpeg;*.gif;*.png'<br />";
}
else
{
    echo "Você não enviou nenhum foto!";
}*/