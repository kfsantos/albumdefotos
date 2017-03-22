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
        <table class="table" style="width: 60%">
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
        <table class="table table-bordered" style="width: 60%">
            <thead>
            <tr class="text-center">
                <td>Nº</td>
                <td>Nome</td>
                <td>Data</td>
                <td>Ação</td>
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
                            <button class="btn btn-primary" type="submit" style="text-align-all: center">Remover
                            </button>
                        </form>

                        <form action="formulario-foto.php" method="post">
                            <input name="id" type="hidden" value="<?= $album['id'] ?>">
                            <button class="btn btn-primary" type="submit" style="text-align-all: center">Enviar foto
                            </button>
                        </form>
                        <form action="fotos-por-album.php" method="post">
                            <input name="id" type="hidden" value="<?= $album['id'] ?>">
                            <button class="btn btn-primary" type="submit" style="text-align-all: center">Visualizar Álbum
                            </button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php require_once("ende-rodape.php"); ?>
