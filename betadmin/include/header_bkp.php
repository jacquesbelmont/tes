<?php
session_start();


if(isset($_POST['academia_apostas']) && !empty($_POST['academia_apostas']) ) {
	$_SESSION['configuracao']['academia_apostas'] = $_POST['academia_apostas'];
}

if( isset($_SESSION['configuracao']['academia_apostas']) && !empty($_SESSION['configuracao']['academia_apostas']) ) {
	
	include_once('../simple_html_dom.php');
	$html  =  file_get_html($_SESSION['configuracao']['academia_apostas'].'/preview');
	$html2 =  file_get_html($_SESSION['configuracao']['academia_apostas']);
	
	//Informacoes para previsao
	foreach($html->find('.preview_teamA .preview_title') as $e) 
    $timeA = $e->outertext . '<br>';
	foreach($html->find('.preview_teamA .preview_body') as $e) 
    $respostaA = $e->outertext . '<br>';
  
  foreach($html->find('.preview_teamB .preview_title') as $e) 
    $timeB = $e->outertext . '<br>';
	foreach($html->find('.preview_teamB .preview_body') as $e) 
    $respostaB = $e->outertext . '<br>';
  
  include("include/termos.php");
  
  $termosA;
  foreach($EQUIPE_AFETADA_FATOR_CASA AS $t) {
		if (strpos($respostaA, $t) !== false) {
				$termosA[] = 'EQUIPE AFETADA FATOR CASA';
		}
	}
  foreach($FRAGILIDADE_DEFENSIVA AS $t) {
		if (strpos($respostaA, $t) !== false) {
				$termosA[] = 'FRAGILIDADE DEFENSIVA';
		}
	}
  foreach($NAO_SOFREU_GOL AS $t) {
		if (strpos($respostaA, $t) !== false) {
				$termosA[] = 'NÃO SOFREU GOL';
		}
	}
  foreach($FORCA_DEFENSIVA AS $t) {
		if (strpos($respostaA, $t) !== false) {
				$termosA[] = 'FORÇA DEFENSIVA';
		}
	}
  foreach($ATAQUE_MARCA_COM_REGULARIDADE AS $t) {
		if (strpos($respostaA, $t) !== false) {
				$termosA[] = 'ATAQUE MARCA C/ REGULARIDADE';
		}
	}
  foreach($ATAQUE_NAO_MARCA_COM_REGULARIDADE AS $t) {
		if (strpos($respostaA, $t) !== false) {
				$termosA[] = 'ATAQUE NÃO MARCA C/ REGULARIDADE';
		}
	}
  foreach($VIRAR_O_JOGO AS $t) {
		if (strpos($respostaA, $t) !== false) {
				$termosA[] = 'VIRAR O JOGO';
		}
	}
  foreach($NAO_SER_GOLEADO AS $t) {
		if (strpos($respostaA, $t) !== false) {
				$termosA[] = 'NÃO SER GOLEADO';
		}
	}
  foreach($NAO_GOLEAR AS $t) {
		if (strpos($respostaA, $t) !== false) {
				$termosA[] = 'NÃO GOLEAR';
		}
	}
	
    
  $termosB;
	foreach($EQUIPE_AFETADA_FATOR_CASA AS $t) {
		if (strpos($respostaB, $t) !== false) {
				$termosB[] = 'EQUIPE AFETADA FATOR CASA';
		}
	}
  foreach($FRAGILIDADE_DEFENSIVA AS $t) {
		if (strpos($respostaB, $t) !== false) {
				$termosB[] = 'FRAGILIDADE DEFENSIVA';
		}
	}
  foreach($NAO_SOFREU_GOL AS $t) {
		if (strpos($respostaB, $t) !== false) {
				$termosB[] = 'NÃO SOFREU GOL';
		}
	}
  foreach($FORCA_DEFENSIVA AS $t) {
		if (strpos($respostaB, $t) !== false) {
				$termosB[] = 'FORÇA DEFENSIVA';
		}
	}
  foreach($ATAQUE_MARCA_COM_REGULARIDADE AS $t) {
		if (strpos($respostaB, $t) !== false) {
				$termosB[] = 'ATAQUE MARCA C/ REGULARIDADE';
		}
	}
  foreach($ATAQUE_NAO_MARCA_COM_REGULARIDADE AS $t) {
		if (strpos($respostaB, $t) !== false) {
				$termosB[] = 'ATAQUE NÃO MARCA C/ REGULARIDADE';
		}
	}
  foreach($VIRAR_O_JOGO AS $t) {
		if (strpos($respostaB, $t) !== false) {
				$termosB[] = 'VIRAR O JOGO';
		}
	}
  foreach($NAO_SER_GOLEADO AS $t) {
		if (strpos($respostaB, $t) !== false) {
				$termosB[] = 'NÃO SER GOLEADO';
		}
	}
  foreach($NAO_GOLEAR AS $t) {
		if (strpos($respostaB, $t) !== false) {
				$termosB[] = 'NÃO GOLEAR';
		}
	}
	//Fim de previsao
	
	//H2H
	$totalDeJogos = 0;
	
	$zeroAzero;
	$umAum;
	$doisAdois;
	foreach($html2->find('#show_h2h table tbody tr td.stat-draw a') as $li){
					echo $li->innertext . '<br>';
					
					if(trim($li->innertext) == '0-0') {
						$zeroAzero++;
					}
					if(trim($li->innertext) == '1-1') {
						$umAum++;
					}
					if(trim($li->innertext) == '2-2') {
						$doisAdois++;
					}
					$totalDeJogos++;
	}
	
	foreach($html2->find('#show_h2h table tbody tr td.stat-lose a') as $li){
					echo $li->innertext . '<br>';
					$totalDeJogos++;
	}
	
	foreach($html2->find('#show_h2h table tbody tr td.stat-win a') as $li){
					echo $li->innertext . '<br>';
					$totalDeJogos++;
	}
	
	echo "Quantidade de jogos: ";
	echo $totalDeJogos;
	echo "<br>";
	echo "Quantidade de 0-0: ";
	echo $zeroAzero;
	echo " -> Cálculo: ".abs( number_format( (($zeroAzero*100)/$totalDeJogos)-100, 1) )."%";
	echo "<br>";
	echo "Quantidade de 1-1: ";
	echo $umAum;
	echo " -> Cálculo: ".abs( number_format( (($umAum*100)/$totalDeJogos)-100, 1) )."%";

	echo "<br>";
	echo "Quantidade de 2-2: ";
	echo $doisAdois;
	//exit;
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Bootstrap Dashboard by Bootstrapious.com</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
    <!-- Fontastic Custom icon font-->
    <link rel="stylesheet" href="css/fontastic.css">
    <!-- Google fonts - Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700">
    <!-- jQuery Circle-->
    <link rel="stylesheet" href="css/grasp_mobile_progress_circle-1.0.0.min.css">
    <!-- Custom Scrollbar-->
    <link rel="stylesheet" href="vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/favicon.ico">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <body>
