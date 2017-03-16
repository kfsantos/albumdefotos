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
    $albuns = selecionarAlbum($conexao, $id);

    foreach ($albuns as $album):
        $nome = $album['nome'];
    endforeach;

    $diretorio = "C:/xampp/htdocs/albumdefotos/albuns/$nome";
    var_dump($diretorio);
    removerDiretorioAlbum($diretorio);
    removerAlbum($conexao, $id);
    ?>
    <p class="text-success">O Album <?= $nome ?>, Foi Removido com sucesso!</p>
    <?php
    header("Location: http://localhost/albumdefotos/cadastrar-album.php");
}