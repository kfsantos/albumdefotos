<?php
/**
 * Created by PhpStorm.
 * User: kfsantos
 * Date: 15/03/2017
 * Time: 10:25
 */
require_once("ende-banco.php");
$nome = preg_replace( '/[`^~\'"]/', null, iconv( 'UTF-8', 'ASCII//TRANSLIT', $_POST['nome'] ) );
$nome = strtoupper($nome);
var_dump($nome);
$data = date('d-m-Y-H-i-s');
$novonome = $nome."-".$data;
$enderecoalbum = "../albumdefotos/albuns/$novonome";
if (isset($nome)) {
    var_dump($enderecoalbum);
    mkdir($enderecoalbum);
    mkdir($enderecoalbum."/temporario");
    mkdir($enderecoalbum."/thumbnail");
    inserirAlbum($conexao, $nome, $data, $enderecoalbum, $novonome);
    ?>
    <p class="text-success">O Album <?= $nome ?>, Foi Inserido com sucesso!</p>

  <!--  <?php
    header("Location: ./formulario-album.php");
}

