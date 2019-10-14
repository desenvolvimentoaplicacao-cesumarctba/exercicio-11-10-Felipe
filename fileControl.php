<?php

require 'mensagens.php'; 

class fileControl
{
	private $url; 
	
	function __construct($url)
	{
		$this->url = $url; 
	}

	public function setArquivo($post)
	{
		if ($post == '') {
			$validacao = 0; 
		} else{
			$post.= PHP_EOL; 
			file_put_contents($this->url, $post, FILE_APPEND); 	
			$validacao = 1; 
		}
		$tipo = 'insert'; 
		echo retorno($tipo, $validacao); 
		
	}

	public function deleteArquivo($item)
	{
		$dados = file_get_contents($this->url) ?? false; 
		$dados = explode(PHP_EOL, $dados, -1); 
		unset($dados[$item]); 
		$dados = implode(PHP_EOL, $dados); 
		$dados.= PHP_EOL; 
		file_put_contents($this->url, $dados); 
		$tipo = 'delete'; 
		$validacao = 1; 
		echo retorno($tipo, $validacao, $item); 
	}

	public function getArquivo()
	{
		
		if (file_exists($this->url)) {
			$dados = file_get_contents($this->url) ?? false; 
			$dados = explode(PHP_EOL, $dados, -1); 
			if ($dados[0] == '') {
				unset($dados[0]); 
			}
			$tipo = 'list'; 
			if (count($dados) == 0) {
				$validacao = 0; 
				$item = 0; 
			} elseif(count($dados) == 1){
				$validacao = 1; 
				$item = count($dados); 
			} else{
				$validacao = 2; 
				$item = count($dados); 
			}
			echo retorno($tipo, $validacao, $item); 

			$tabela = "<table>";
			$tabela.= "<tr class='head'>"; 
			$tabela.= "<th class='key'> # </th>"; 
			$tabela.= "<th class='value'> Conteúdo do arquivo </th>"; 
			$tabela.= "<th class='delete'> Ação </th>"; 
			$tabela.= "</tr>"; 
			foreach ($dados as $key => $value) {
				$tabela.= "<tr>"; 
				$tabela.= "<td class='key'> $key </td>"; 
				$tabela.= "<td class='value'> $value </td>"; 
				$tabela.= "<td class='delete'> <a href='index.php?option=delete&item=$key'><button type='button' class='delete'> x </button></a> </td>"; 
				$tabela.= "</tr>"; 
			}
			$tabela.= "</table>";
			echo $tabela;

		} else{
			//Arquivo/diretório solicitado em get não existe
			$tipo = 'undefined-directory'; 
			echo retorno($tipo, 1); 

		}
	}
}