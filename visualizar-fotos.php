<?php
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
if(!$arquivos){
    echo "<script> alert('O Álbum não possui fotos!') </script> ";
    header( "refresh: 0; url= formulario-album.php" );
    
    
}
sort($arquivos);

?>

<!DOCTYPE html>
<html>
<head>
<script src="./js/jquery.min.js"></script>
<script src="./js/jquery.gallerie.js"></script>
<link rel="stylesheet" type="text/css" href="./css/bootstrap.css"/>
<link rel="stylesheet" type="text/css" href="./css/gallerie.css"/>
<link rel="stylesheet" type="text/css" href="./css/gallerie-effects.css"/>

<script type="text/javascript">
$(document).ready(function(){
	$('#gallery').gallerie();
});

</script>


</head>

<body>
<div id="gallery">
<div class="container" align="center">
    <div class="col-lg-12" align="center">
<table class="table table-bordered">
<tr align="center">
<?php
foreach($arquivos as $arq){  
	echo '<td align="center">';
	echo '<a href="'.$j.$arq.'"><img src="'.$j2.$arq.'"/></a>';
	echo '</td>';
}
?>
</tr>
</table>
</div>
</div>
</div>
</body>
</html>