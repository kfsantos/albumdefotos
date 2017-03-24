<?php
/**
 * Created by PhpStorm.
 * User: kfsantos
 * Date: 21/03/2017
 * Time: 12:19
 */
require_once("ende-cabecalho.php");
require_once("ende-banco.php");
$album = selecionarAlbum($conexao, $_POST['id']);
$enderecoalbum = $album['enderecoalbum'];
$d = opendir($enderecoalbum);
$i = 0;
$j = "albuns/TESTE-24-03-2017-16-12-40/";
$nome = readdir($d);
while( $nome != false ){
    if( !is_dir($nome) and ($nome != 'Thumbs.db') and ($nome != 'temporario') ){
        $arquivos[$i] = $nome;
                $i++;
    }
    $nome = readdir($d);
}
sort($arquivos);
 
foreach($arquivos as $arq){
    echo '<a href="'.$j.$arq.'" rel="lightbox[roadtrip]"><img src="'.$j.$arq.' " alt="..." /></a> ';

    
}

?>

<?php require_once("ende-rodape.php");


