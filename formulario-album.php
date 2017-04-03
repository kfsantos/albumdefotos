<?php
/**
 * Created by PhpStorm.
 * User: kfsantos
 * Date: 15/03/2017
 * Time: 08:59
 */
require_once("ende-cabecalho.php");
require_once("ende-banco.php");

?>
<div class="row">
    <div class="col-md-12" align="center">
        <h2 class="text-center">Formulário de Cadastro de Álbum</h2>
        <br>
        <table class="table" style="width: 65%">
            <form action="album-adicionar.php" method="post">
                <tr>
                    <td>Nome:</td>
                    <td><input class="form-control" type="text" name="nome" required="required"></td>
                </tr>
                <tr>
                    <td>
                        <button class="btn btn-primary" type="submit">Cadastrar</button>
                    </td>
                </tr>
            </form>
        </table>
        <br>
        <table class="table table-bordered" style="width: 65%" >
            <thead>
            <tr class="text-center">
                <td>Nº</td>
                <td>Nome</td>
                <td>Data</td>
                <td colspan="3">Ação</td>
            </tr>
            </thead>
            <tbody>
            <?php
            $albuns = listarAlbum($conexao);
            foreach ($albuns as $album):
                ?>
                <tr align="center">
                    <td><?= $album['id'] ?></td>
                    <td><?= $album['nome'] ?></td>
                    <td><?= $album['data'] ?></td>
                    <td> 
                        <form action="album-remover.php" method="post">
                            <input name="id" type="hidden" value="<?= $album['id'] ?>">                            
<!--     Função Onclick com duas funções, onde chama a confirmação e caso seja verdadeiro, executa a exclusão do registro       -->
                            <input type="image" src="./img/fechar.png" width="25" height="25" onClick="return (confirm('Deseja realmente EXCLUIR o álbum <?= $album['nome']?> ?') && this.form.submit())" title="Excluir Álbum">
                        </form>
                        </td>
                        <td>
                        <form action="formulario-foto.php" method="post">
                            <input name="id" type="hidden" value="<?= $album['id'] ?>">
                            <input type="image" src="./img/enviar.png" width="25" height="25" onClick="this.form.submit()" title="Inserir Foto">
                        </form>
                        </td>
                        <td>
                        <form action="visualizar-fotos.php" method="post">
                            <input name="id" type="hidden" value="<?= $album['id'] ?>">
                            <input type="image" src="./img/visualizar.png" width="25" height="25" onClick="this.form.submit()" title="Visualizar Fotos">
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php require_once("ende-rodape.php"); ?>
