<?php

function retorno($tipo, $validacao, $item = null)
{

	$alerta = "<link rel='stylesheet' type='text/css' href='style.css'>"; 
	
	$botaoHome = "<a href='index.php?option=home'> "; 
	$botaoHome.= "<button type='button' class='insert'> "; 
	$botaoHome.= "Voltar para Home </button></a> "; 

	$botaoLista = "<a href='index.php?option=list'> "; 
	$botaoLista.= "<button type='button' class='insert'> "; 
	$botaoLista.= "Ver lista </button></a> "; 

	if ($tipo == 'insert') {
		
		switch ($validacao) {
			case 0:
				$alerta.= "<div class='alert-danger'>"; 
				$alerta.= '<b>Houve um problema!</b> O valor não pode ser inserido. ';
				$alerta.= '</div>'; 
				break;

			case 1:
				$alerta.= "<div class='alert-success'>"; 
				$alerta.= '<b>Sucesso!</b> O valor foi inserido corretamente. ';
				$alerta.= '</div>'; 
				break;
			
			default:
				$alerta.= "<div class='alert-info'>"; 
				$alerta.= '<b>Que coisa!</b> Nada aconteceu :( ';
				$alerta.= '</div>'; 
				break;
		}

	} elseif ($tipo == 'deleted') {
		
		switch ($validacao) {
			case 0:
				$alerta.= "<div class='alert-danger'>"; 
				$alerta.= "<b>Algo deu errado!</b> O item não foi excluído. ";
				$alerta.= '</div>'; 
				break;

			case 1:
				$alerta.= "<div class='alert-info'>"; 
				$alerta.= "<b>Operação concluída!</b> A <b class='deleted'>exclusão</b> foi realizada com sucesso. ";
				$alerta.= '</div>'; 
				break;
			
			default:
				$alerta.= "<div class='alert-info'>"; 
				$alerta.= '<b>Que pena!</b> Nada aconteceu :( Tente novamente. ';
				$alerta.= '</div>'; 
				break;
		}

	} elseif ($tipo == 'list') {
		
		switch ($validacao) {
			case 0:
				$alerta.= "<div class='alert-danger'>"; 
				$alerta.= "<b>Ops!</b> O arquivo não contém registros. ";
				$alerta.= '</div>'; 
				break;

			case 1:
				$alerta.= "<div class='alert-success'>"; 
				$alerta.= "<b>Listagem completa!</b> O arquivo contém $item único registro. ";
				$alerta.= '</div>'; 
				break;

			case 2: 
				$alerta.= "<div class='alert-success'>"; 
				$alerta.= "<b>Listagem completa!</b> O arquivo contém $item registros. ";
				$alerta.= '</div>'; 
				break;
			
			default:
				$alerta.= "<div class='alert-info'>"; 
				$alerta.= '<b>Que pena!</b> Não aconteceu nada :( Tente de volta. ';
				$alerta.= '</div>'; 
				break;
		}
		$botaoLista = false; 

	} elseif ($tipo == 'default') {
		$alerta.= "<div class='alert-danger'>"; 
		$alerta.= "<b>Ops!</b> Opção inválida. ";
		$alerta.= '</div>'; 
		$botaoLista = false; 
	} elseif ($tipo == 'undefined-directory') {
		$alerta.= "<div class='alert-danger'>"; 
		$alerta.= "<b>Atenção!</b> Arquivo ou diretório não existe. ";
		$alerta.= '</div>'; 
		$botaoLista = false; 
	}

	echo $alerta.'<br>'; 
	echo $botaoHome; 
	echo $botaoLista; 

}