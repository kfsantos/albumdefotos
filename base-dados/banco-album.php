<?php
/**
 * Created by PhpStorm.
 * User: kfsantos
 * Date: 15/03/2017
 * Time: 08:11
 */
require_once("conecta.php");


// ---------------------------------------------- A L B U M  D E  F O T O S ----------------------------------------------

function inserirAlbum($conexao, $nome, $data, $enderecoalbum, $novonome)
{
    $nome = mysqli_real_escape_string($conexao, $nome);
    $data = mysqli_real_escape_string($conexao, $data);
    $query = "insert into album (nome, data, enderecoalbum, novonome) values ('{$nome}','{$data}', '{$enderecoalbum}','{$novonome}')";
    return mysqli_query($conexao, $query);
}

function removerAlbum($conexao, $id)
{
    $query = "DELETE FROM album WHERE id = {$id}";
    return mysqli_query($conexao, $query);

}

function listarAlbum($conexao)
{
    $albuns = array();
    $query = "SELECT * FROM album";
    $resultado = mysqli_query($conexao, $query);
    while ($album = mysqli_fetch_assoc($resultado)) {
        array_push($albuns, $album);
    }
    return $albuns;
}

function selecionarAlbum($conexao, $id)
{
    $query = "SELECT * FROM album WHERE id = {$id}";
    $resultado = mysqli_query($conexao, $query);
    return $album = mysqli_fetch_assoc($resultado);
}


function removerDiretorioAlbum($diretorio)
{
    $files = glob($diretorio . "/temporario/*.*");                                         /* Carrega os arquivos do Diretório*/
    foreach ($files as $file):
        is_dir($file) ? removerDiretorio($file) : unlink($file);                          /* Remove arquivo um a um Diretório*/
    endforeach;
    rmdir($diretorio."/temporario");                                                       /* Finalmente remove a pasta*/
    
    $files = glob($diretorio . "/*.*");                                                   /* Carrega os arquivos do Diretório*/
    foreach ($files as $file):
        is_dir($file) ? removerDiretorio($file) : unlink($file);                         /* Remove arquivo um a um Diretório*/
    endforeach;
    rmdir($diretorio);                                                                  /* Finalmente remove a pasta*/
    return;
}

function removerPastaTemporaria($diretorio){
    $files = glob($diretorio . "/temporario/*.*");                                         /* Carrega os arquivos do Diretório*/
    foreach ($files as $file):
        is_dir($file) ? removerDiretorio($file) : unlink($file);                          /* Remove arquivo um a um Diretório*/
    endforeach;
                                                          /* Finalmente remove a pasta*/
}


// ---------------------------------------------- F O T O S ----------------------------------------------

function inserirFoto($conexao, $nome, $album_id)
{
    echo "<br>";
    echo "Nome";
    var_dump($nome);
    echo "<br>";
    echo "ID";
    var_dump($album_id);
    $query = "INSERT INTO foto (nome,album_id) values ('{$nome}', '{$album_id}')";
    return mysqli_query($conexao, $query);
}

function selecionarFotosAlbum($conexao, $id)
{
    $query = "SELECT * FROM foto WHERE id = '{$id}'";
    return mysqli_query($conexao, $query);
}

function removerFoto($conexao, $id)
{
    $query = "DELETE FROM foto WHERE album_id = '{$id}'";
    return mysqli_query($conexao, $query);

}