<?php
/**
 * Created by PhpStorm.
 * User: kfsantos
 * Date: 15/03/2017
 * Time: 08:11
 */
require_once("conecta.php");

function inserirAlbum($conexao, $nome, $data, $enderecoalbum)
{
    $nome = mysqli_real_escape_string($conexao, $nome);
    $data = mysqli_real_escape_string($conexao, $data);
    $query = "insert into album (nome, data, enderecoalbum) values ('{$nome}','{$data}', '{$enderecoalbum}')";
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
    $albuns = array();
    $query = "SELECT * FROM album WHERE id = {$id}";
    $resultado = mysqli_query($conexao, $query);
    while ($album = mysqli_fetch_assoc($resultado)) {
        array_push($albuns, $album);
    }
    return $albuns;
}

function inserirFoto($conexao, $nomeImagem, $idalbum)
{
    $query = "INSERT INTO foto(endereco_url, album_id) values ('{$nomeImagem}', '{$idalbum}')";
    return mysqli_query($conexao, $query);
}

function selecionarFotosAlbum($conexao, $id)
{
    $query = "SELECT * FROM foto WHERE id = '{$id}'";
    return mysqli_query($conexao, $query);
}

function removerDiretorioAlbum($nome)
{
    $files = glob($nome . '/*.*');                                      /* Carrega os arquivos do Diretório*/
    foreach ($files as $file):
        is_dir($file) ? removerDiretorio($file) : unlink($file);        /* Remove arquivo um a um Diretório*/
    endforeach;
    rmdir($nome);                                                       /* Finalmente remove a pasta*/
    return;
}