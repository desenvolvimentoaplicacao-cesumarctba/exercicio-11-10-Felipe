<?php

require_once 'fileControl.php'; 
require_once 'mensagens.php'; 

echo "<link rel='stylesheet' type='text/css' href='style.css'>";

$endereco = 'dados.txt'; 
$file = new fileControl($endereco); 

$option = $_GET['option'] ?? false; 
$item = $_GET['item'] ?? false; 
$post = $_POST['texto'] ?? false; 

switch ($option) {
	case 'home':
		require 'formulario.html'; 
		break;

	case 'list':
		$file->getArquivo(); 
		break;
	
	case 'insert':
		$file->setArquivo($post); 
		
		break;

	case 'delete': 
		$file->deleteArquivo($item); 
		header('Location: index.php?option=deleted'); 
		break;

	case 'deleted':
		echo retorno($option, 1);
		break;

	default:
		echo retorno('default', 1); 
		break;
}