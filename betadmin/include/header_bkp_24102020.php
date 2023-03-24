<?php
session_start();


if(isset($_POST['academia_apostas']) && !empty($_POST['academia_apostas']) ) {
	$_SESSION['configuracao']['academia_apostas'] = $_POST['academia_apostas'];
}

if( isset($_SESSION['configuracao']['academia_apostas']) && !empty($_SESSION['configuracao']['academia_apostas']) ) {
	
	include_once('../simple_html_dom.php');
	$html  =  file_get_html($_SESSION['configuracao']['academia_apostas'].'/preview');
	$html2 =  file_get_html($_SESSION['configuracao']['academia_apostas']);
	
	preg_match('/(\d+)/', $_SESSION['configuracao']['academia_apostas'], $matches);
	$idControle = $matches[0];
	$html3 =  file_get_contents("https://www.academiadasapostasbrasil.com/stats/ajax_h2h_all/".$idControle);
	
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
	


	// ************* ACADEMIA DAS APOSTAS ***********
	// TA FALTANDO CONTAR CADA JOGO 
	//H2H

	$totalDeJogosH2H = 0;
	$totalDeJogosH2hUnder05 = 0;
	$totalDeJogosH2hUnder15 = 0;
	$totalDeJogosH2hUnder25 = 0;

	//empates
	$H2hUnder05zeroAzero;	$H2hUnder15umAum;	$H2hUnder15zeroAzero; $H2hUnder25umAum;

	//under 1,5 - H2H
	$H2hUnder15umAzero;	$H2hUnder15zeroAum;	$H2hUnder15zeroAzero; $H2hUnder15umAum;

	//under 2,5 - H2H -> 0-3, 3-0, 1-2, 2-1 
	$H2hUnder25zeroAtres; $H2hUnder25tresAzero; $H2hUnder25umAdois; $H2hUnder25doisAum; 
	
	//under 3,5 - H2H -> 0-4, 4-0, 1-3, 3-1 
	$H2hUnder35zeroAquatro; $H2hUnder35quatroAzero; $H2hUnder35umAtres; $H2hUnder35tresAum; $H2hUnder35doisAdois; 

//echo $html3; exit;
$html2 = <<<HTML
$html3
HTML;

	$html2 = str_get_html($html3);
//echo $html2; exit;

	//foreach($html2->find('#show_h2h_all table tbody tr td.stat-draw a') as $li){
	foreach($html2->find('td[class=stat-draw] a') as $li){
		//echo $li->innertext . '<br>';
		if(trim($li->innertext) == '0-0') {
			$H2hUnder05zeroAzero++;
			$totalDeJogosH2hUnder05++;
			
			$H2hUnder15zeroAzero++;
			$totalDeJogosH2hUnder15++;
		}//h2h
		if(trim($li->innertext) == '1-1') {
			//$H2hUnder15umAum++;
			//$totalDeJogosH2hUnder05++;
			
			//1,5
			$H2hUnder15umAum++;
			$totalDeJogosH2hUnder25++;

		}
		if(trim($li->innertext) == '2-2') {
			//$H2hUnder15doisAdois++;
			//$totalDeJogosH2hUnder05++;
			
			//3,5
			$H2hUnder35doisAdois++;
			$totalDeJogosH2hUnder35++;
			
		}
		if(trim($li->innertext) == '3-3') {
			//$H2hUnder15tresAtres++;
			//$totalDeJogosH2hUnder05++;
		}
		//$totalDeJogosH2hUnder15++;
		$totalDeJogosH2H++;

	}

	//foreach($html2->find('#show_h2h_all table tbody tr td.stat-lose a') as $li){
	foreach($html2->find('td[class=stat-lose] a') as $li){
		//echo $li->innertext . '<br>';
		//under 1,5
		if(trim($li->innertext) == '0-1') {
			$H2hUnder15zeroAum++;
			$totalDeJogosH2hUnder15++;
		} 
		if(trim($li->innertext) == '1-0') {
			$H2hUnder15umAzero++;		
			$totalDeJogosH2hUnder15++;
		}

		//under 2,5
		if(trim($li->innertext) == '0-3') {
			$H2hUnder25zeroAtres++;
			$totalDeJogosH2hUnder25++;
		} 
		if(trim($li->innertext) == '3-0') {
			$H2hUnder25tresAzero++;		
			$totalDeJogosH2hUnder25++;
		}
		if(trim($li->innertext) == '1-2') {
			$H2hUnder25umAdois++;
			$totalDeJogosH2hUnder25++;
		} 
		if(trim($li->innertext) == '2-1') {
			$H2hUnder25doisAum++;		
			$totalDeJogosH2hUnder25++;
		}

		//under 3,5
		if(trim($li->innertext) == '0-4') {
			$H2hUnder35zeroAquatro++;
			$totalDeJogosH2hUnder35++;
		} 
		if(trim($li->innertext) == '4-0') {
			$H2hUnder35quatroAzero++;		
			$totalDeJogosH2hUnder35++;
		}
		if(trim($li->innertext) == '1-3') {
			$H2hUnder35umAtres++;
			$totalDeJogosH2hUnder35++;
		} 
		if(trim($li->innertext) == '3-1') {
			$H2hUnder35tresAum++;		
			$totalDeJogosH2hUnder35++;
		}
		$totalDeJogosH2H++;
	}
	
	//foreach($html2->find('#show_h2h_all table tbody tr td.stat-win a') as $li){
	foreach($html2->find('td[class=stat-win] a') as $li){
		//echo $li->innertext . '<br>';
		//under 1,5
		if(trim($li->innertext) == '0-1') {
			$H2hUnder15zeroAum++;
			$totalDeJogosH2hUnder15++;

		} 
		if(trim($li->innertext) == '1-0') {
			$H2hUnder15umAzero++;
			$totalDeJogosH2hUnder15++;

		}
		//under 2,5
		if(trim($li->innertext) == '0-3') {
			$H2hUnder25zeroAtres++;
			$totalDeJogosH2hUnder25++;
		} 
		if(trim($li->innertext) == '3-0') {
			$H2hUnder25tresAzero++;		
			$totalDeJogosH2hUnder25++;
		}
		if(trim($li->innertext) == '1-2') {
			$H2hUnder25umAdois++;
			$totalDeJogosH2hUnder25++;
		} 
		if(trim($li->innertext) == '2-1') {
			$H2hUnder25doisAum++;		
			$totalDeJogosH2hUnder25++;
		}
		$totalDeJogosH2H++;
	}





	// TIME A

	$tAtotalDeJogos = 0;
	//empates
	$tAzeroAzero;	$tAumAum;	$tAdoisAdois;	$tAtresAtres;	$tAquatroAquatro;	$tAcincoAcinco;	$tAseisAseis;	$tAseteAsete;
	//under 3,5
	$tAzeroAquatro; $tAdoisAdois; $tAtresAum; $tAquatroAzero; $tAumAtres;
	//under 4,5
	$tAumAquatro; $tAquatroAum; $tAtresAdois; $tAdoisAtres; $tAzeroAcinco; $tAcincoAzero;
	//under 5,5
	$tAtresAtres; $tAseisAzero; $tAzeroAseis; $tAcincoAum; $tAumAcinco; $tAquatroAdois; $tAdoisAquatro;
	//under 6,5
	$tAseteAzero; $tAzeroAsete; $tAumAseis; $tAseisAum; $tAdoisAcinco; $tAcincoAdois; $tAquatroAtres; $tAtresAquatro;
	//under 7,5
	$tAoitoAzero; $tAzeroAoito; $tAumAsete; $tAseteAum; $tAseisAdois; $tAdoisAseis; $tAcincoAtres; $tAtresAcinco; $tAquatroAquatro;

	

	// TIME B

	$tBtotalDeJogos = 0;
	//empates
	$tBzeroAzero;	$tBumAum;	$tBdoisAdois;	$tBtresAtres;	$tBquatroAquatro;	$tBcincoAcinco;	$tBseisAseis;	$tBseteAsete;
	//under 3,5
	$tBzeroAquatro; $tBdoisAdois; $tBtresAum; $tBquatroAzero; $tBumAtres;
	//under 4,5
	$tBumAquatro; $tBquatroAum; $tBtresAdois; $tBdoisAtres; $tBzeroAcinco; $tBcincoAzero;
	//under 5,5
	$tBtresAtres; $tBseisAzero; $tBzeroAseis; $tBcincoAum; $tBumAcinco; $tBquatroAdois; $tBdoisAquatro;
	//under 6,5
	$tBseteAzero; $tBzeroAsete; $tBumAseis; $tBseisAum; $tBdoisAcinco; $tBcincoAdois; $tBquatroAtres; $tBtresAquatro;
	//under 7,5
	$tBoitoAzero; $tBzeroAoito; $tBumAsete; $tBseteAum; $tBseisAdois; $tBdoisAseis; $tBcincoAtres; $tBtresAcinco; $tBquatroAquatro;


	$totalDeJogos = $totalDeJogosH2H;
	
	
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Tabela</title>
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
