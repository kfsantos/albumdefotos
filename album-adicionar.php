<?php
/**
 * Created by PhpStorm.
 * User: kfsantos
 * Date: 15/03/2017
 * Time: 10:25
 */
require_once("ende-banco.php");
$nome = $_POST['nome'];
$data = $_POST['data'];
$enderecoalbum = "C:/xampp/htdocs/albumdefotos/albuns/$nome";
if (isset($nome)) {
    var_dump($enderecoalbum);
    mkdir($enderecoalbum);
    inserirAlbum($conexao, $nome, $data, $enderecoalbum);
    ?>
    <p class="text-success">O Album <?= $nome ?>, Foi Inserido com sucesso!</p>

    <?php
    header("Location: http://localhost/albumdefotos/cadastrar-album.php");
}
