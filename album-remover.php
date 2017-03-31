<?php
/**
 * Created by PhpStorm.
 * User: kfsantos
 * Date: 15/03/2017
 * Time: 12:39
 */
require_once("ende-banco.php");
$id = $_POST['id'];
if (isset($id)) {
    $album = selecionarAlbum($conexao, $id);
    $nome = $album['novonome'];
    var_dump($nome);
    $diretorio = "../albumdefotos/albuns/$nome";
    var_dump($diretorio);
    removerDiretorioAlbum($diretorio);
    removerFoto($conexao, $id);
    removerAlbum($conexao, $id);
    
    ?>
    <p class="text-success">O Album <?= $nome ?>, Foi Removido com sucesso!</p>
    <?php
    header("Location: /albumdefotos/formulario-album.php");
    die();
}