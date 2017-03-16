<?php
/**
 * Created by PhpStorm.
 * User: kfsantos
 * Date: 15/03/2017
 * Time: 10:25
 */
require_once("ende-banco.php");
$id = $_POST['id'];
$nome = $_POST['nome'];
$data = $_POST['data'];

if (isset($nome)) {
    inserirAlbum($conexao, $nome, $data);
    mkdir("C:/xampp/htdocs/albumdefotos/albuns/$nome");
    ?>
    <p class="text-success">O Album <?= $nome ?>, Foi Inserido com sucesso!</p>

    <?php
    header("Location: http://localhost/albumdefotos/cadastrar-album.php");
}
