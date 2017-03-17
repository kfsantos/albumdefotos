<?php
/**
 * Created by PhpStorm.
 * User: kfsantos
 * Date: 15/03/2017
 * Time: 10:25
 */
require_once("ende-banco.php");
$nome = $_POST['nome'];
$data = date('d-m-Y-H-i-s');
$novonome = $nome.$data;
$enderecoalbum = "C:/xampp/htdocs/albumdefotos/albuns/$novonome";
if (isset($nome)) {
    var_dump($enderecoalbum);
    mkdir($enderecoalbum);
    inserirAlbum($conexao, $nome, $data, $enderecoalbum, $novonome);
    ?>
    <p class="text-success">O Album <?= $nome ?>, Foi Inserido com sucesso!</p>

    <?php
    header("Location: http://localhost/albumdefotos/formulario-album.php");
}
