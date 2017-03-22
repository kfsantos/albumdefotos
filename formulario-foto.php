<?php
/**
 * Created by PhpStorm.
 * User: kfsantos
 * Date: 17/03/2017
 * Time: 09:43
 */
require_once("ende-cabecalho.php");
?>
    <div class="row">
        <div class="col-md-12" align="center">
            <h2 class="text-center">Formulário de Envio de Fotos</h2>
            <br>
            <br>
            <form action="foto-adicionar.php" enctype="multipart/form-data" method="post">
                <input type="hidden" name="id" value="<?= $_POST['id']?>">
                <input type="file" name="foto[]" multiple><br>
                <input type="submit" value="Enviar">
            </form>
        </div>
    </div>
<?php require_once("ende-rodape.php");