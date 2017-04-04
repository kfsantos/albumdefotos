<?php

// Chama o arquivo com a classe WideImage
require_once('./lib/WideImage.php');


function redimensionarimagem($conexao,$endereco, $novonome){
	// Carrega a imagem a ser manipulada
	$image = WideImage::load($endereco.'/temporario/'.$novonome);
	// Redimensiona a imagem
	$image = $image->resize(400, 300, fill);
	// Salva a imagem em um arquivo (novo ou não)
	$image->saveToFile($endereco.'/'.$novonome);	
}


function redimensionarthumbnail($conexao,$endereco, $novonome){
	// Carrega a imagem a ser manipulada
	$image = WideImage::load($endereco.'/temporario/'.$novonome);
	// Redimensiona a imagem
	$image = $image->resize(60, 60, fill);
	// Salva a imagem em um arquivo (novo ou não)
	$image->saveToFile($endereco."/thumbnail/".$novonome);	
}