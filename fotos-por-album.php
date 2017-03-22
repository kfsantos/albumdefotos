<?php
/**
 * Created by PhpStorm.
 * User: 72512113272
 * Date: 21/03/2017
 * Time: 12:19
 */
require_once("ende-cabecalho.php");
require_once("ende-banco.php");
?>

<script type="text/javascript">
	function drop(url)
	{
        document.getElementById("opt").innerHTML = "Deseja apagar o arquivo \""+url+"\" ? <br><br> <button onclick=\"udrop('"+url+"')\">sim</button>&nbsp;<button onclick=\"cancel()\">não</button>"
		document.getElementById("opt").style.display = 'block';
	}

	function cancel()
    {
        document.getElementById("opt").style.display = 'none';
    }
	function udrop(url)
	{
        window.location.href = 'delfile.php?file='+url;
    }
  </script>
<?php
$album = selecionarAlbum($conexao, $_POST['id']);
$dir = $album['enderecoalbum'];

$exts = array('jpg', 'png', 'jpeg');
if (is_dir($dir)) {

    if ($d = opendir($dir)) {
        while (($file = readdir($d)) !== false) {
            if (filetype($dir . '/' . $file) == 'file') {
                # recupera a extensao do arquivo
                $extensao = explode(".", $file);
                for ($i = 0; $i <= count($exts) - 1; $i++) {
                    if ($extensao[1] == $exts[$i]) {

                        # Criando o link da imagem pra o lightbox e exibindo a thumb
                        $alb .= "<a href=\"$dir/{$file}\" rel=\"ex0\" title=\"\"><img border=\"0\" src=\"thumb.php?img=$dir/{$file}\"></a>\n";

                        # Criando o link da imagem pra excluir a imagem
                        //$alb .=  "<a href=\"javascript:drop('$dir/{$file}')\"> <img src=\"thumb.php?img=$dir/{$file}\" class=\"thumb\"></a>\n";

                    }
                }
            }
        }
        $onload .= " $(\"a[rel='ex$k']\").colorbox();\n";
    }
    closedir($d);

}
?>
    <script>
        $(document).ready(function () {
            <?=$onload?>
            $("#click").click(function () {
                $('#click').css({
                    "background-color": "#f00",
                    "color": "#fff",
                    "cursor": "inherit"
                }).text("Open this window again and this message will still be here.");
                return false;
            });
        });
    </script>

<?= $alb ?>





<?php
require_once("ende-rodape.php");
?>