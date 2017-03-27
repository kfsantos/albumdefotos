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
$j = ($enderecoalbum."/");
$j2 = ($enderecoalbum."/thumbnail/");
$nome = readdir($d);
while( $nome != false ){
    if( !is_dir($nome) and ($nome != 'Thumbs.db') and ($nome != 'temporario') and ($nome != 'thumbnail')){
        $arquivos[$i] = $nome;
                $i++;
    }
    $nome = readdir($d);
}
sort($arquivos);
?>
<div id="gallery">
 
 <?php
foreach($arquivos as $arq){  
	?>
	<a href="<?= $j.$arq?>"><img src="<?= $j2.$arq ?>"/></a>
	<?php
}
?>
</div>


<?php require_once("ende-rodape.php");


