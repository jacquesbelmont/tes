<?php
session_start();


if(isset($_POST['academia_apostas']) && !empty($_POST['academia_apostas']) ) {
	$_SESSION['configuracao']['academia_apostas'] = $_POST['academia_apostas'];
}

if( isset($_SESSION['configuracao']['academia_apostas']) && !empty($_SESSION['configuracao']['academia_apostas']) ) {
	
	require_once('../simple_html_dom.php');
	$html  =  file_get_html($_SESSION['configuracao']['academia_apostas'].'/preview');
	
  $html2 =  file_get_html($_SESSION['configuracao']['academia_apostas']);
	//echo "<br>";
  $_SESSION['configuracao']['academia_apostas'] = str_replace("/preview", "", $_SESSION['configuracao']['academia_apostas']);
  $itens = explode('/',$_SESSION['configuracao']['academia_apostas']);
  $idControle = end($itens);
	//preg_match('/[A-Za-z0-9]/', $_SESSION['configuracao']['academia_apostas'], $matches);
	//echo $idControle = $matches[0];
	$html3   = file_get_contents("https://www.academiadasapostasbrasil.com/stats/ajax_h2h_all/".$idControle);
	//$htmlAeB = file_get_contents("https://www.academiadasapostasbrasil.com/stats/ajax_all_last_games/".$idControle);
  //exit;
  //Pega nome da série
  $nomeDaSerie = array();
  //foreach($html->find('.breadcrumbs ul li a span') as $e) 
    //$nomeDaSerie[] = $e->innertext;

  foreach($html->find('.gamehead a') as $e) 
    $nomeDaSerie[] = $e->innertext;
    
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
	

//echo $html3; exit;
//$html2 = <<<HTML
//$html3
//HTML;

  $htmlH2H = "https://www.academiadasapostasbrasil.com/stats/ajax_h2h_all/".$idControle;

	$html2 = file_get_html($htmlH2H);
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

			//5,5
      $H2hUnder55tresAtres++;
      $totalDeJogosH2hUnder55++;
		}

		if(trim($li->innertext) == '4-4') {
			//$H2hUnder15tresAtres++;
			//$totalDeJogosH2hUnder05++;

			//5,5
      $H2hUnder75quatroAquatro++;
      $totalDeJogosH2hUnder75++;
		}
		
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

		//under 4,5
		if(trim($li->innertext) == '1-4') {
			$H2hUnder45umAquatro++;
			$totalDeJogosH2hUnder45++;
		} 
		if(trim($li->innertext) == '4-1') {
			$H2hUnder45quatroAum++;
			$totalDeJogosH2hUnder45++;
		}
		if(trim($li->innertext) == '2-3') {
			$H2hUnder45doisAtres++;
			$totalDeJogosH2hUnder45++;
		} 
		if(trim($li->innertext) == '3-2') {
			$H2hUnder45tresAdois++;
			$totalDeJogosH2hUnder45++;
		}
		if(trim($li->innertext) == '0-5') {
			$H2hUnder45zeroAcinco++;
			$totalDeJogosH2hUnder45++;
		}
		if(trim($li->innertext) == '5-0') {
			$H2hUnder45cincoAzero++;
			$totalDeJogosH2hUnder45++;
		}

		//under 5,5
		if(trim($li->innertext) == '6-0') {
			$H2hUnder55seisAzero++;
			$totalDeJogosH2hUnder55++;
		}
		if(trim($li->innertext) == '0-6') {
			$H2hUnder55zeroAseis++;
			$totalDeJogosH2hUnder55++;
		}
		if(trim($li->innertext) == '5-1') {
			$H2hUnder55cincoAum++;
			$totalDeJogosH2hUnder55++;
		}
		if(trim($li->innertext) == '1-5') {
			$H2hUnder55umAcinco++;
			$totalDeJogosH2hUnder55++;
		}
		if(trim($li->innertext) == '2-4') {
			$H2hUnder45doisAquatro++;
			$totalDeJogosH2hUnder45++;
		} 
		if(trim($li->innertext) == '4-2') {
			$H2hUnder45quatroAdois++;
			$totalDeJogosH2hUnder45++;
		}

		//under 6,5
		if(trim($li->innertext) == '7-0') {
			$H2hUnder65seteAzero++;
			$totalDeJogosH2hUnder65++;
		}
		if(trim($li->innertext) == '0-7') {
			$H2hUnder65zeroAsete++;
			$totalDeJogosH2hUnder65++;
		}
		if(trim($li->innertext) == '1-6') {
			$H2hUnder65umAseis++;
			$totalDeJogosH2hUnder65++;
		}
		if(trim($li->innertext) == '6-1') {
			$H2hUnder65seisAum++;
			$totalDeJogosH2hUnder65++;
		}
		if(trim($li->innertext) == '2-5') {
			$H2hUnder65doisAcinco++;
			$totalDeJogosH2hUnder65++;
		}
		if(trim($li->innertext) == '5-2') {
			$H2hUnder65cincoAdois++;
			$totalDeJogosH2hUnder65++;
		}
		if(trim($li->innertext) == '4-3') {
			$H2hUnder65quatroAtres++;
			$totalDeJogosH2hUnder65++;
		}
		if(trim($li->innertext) == '3-4') {
			$H2hUnder65tresAquatro++;
			$totalDeJogosH2hUnder65++;
		}

		//under 7,5
		if(trim($li->innertext) == '8-0') {
			$H2hUnder75oitoAzero++;
			$totalDeJogosH2hUnder75++;
		}
		if(trim($li->innertext) == '0-8') {
			$H2hUnder75zeroAoito++;
			$totalDeJogosH2hUnder75++;
		}
		if(trim($li->innertext) == '1-7') {
			$H2hUnder75umAsete++;
			$totalDeJogosH2hUnder75++;
		}
		if(trim($li->innertext) == '7-1') {
			$H2hUnder75seteAum++;
			$totalDeJogosH2hUnder75++;
		}
		if(trim($li->innertext) == '6-2') {
			$H2hUnder75seisAdois++;
			$totalDeJogosH2hUnder75++;
		}
		if(trim($li->innertext) == '2-6') {
			$H2hUnder75doisAseis++;
			$totalDeJogosH2hUnder75++;
		}
		if(trim($li->innertext) == '5-3') {
			$H2hUnder75cincoAtres++;
			$totalDeJogosH2hUnder75++;
		}
		if(trim($li->innertext) == '3-5') {
			$H2hUnder75tresAcinco++;
			$totalDeJogosH2hUnder75++;
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

		//under 4,5
		if(trim($li->innertext) == '1-4') {
			$H2hUnder45umAquatro++;
			$totalDeJogosH2hUnder45++;
		} 
		if(trim($li->innertext) == '4-1') {
			$H2hUnder45quatroAum++;
			$totalDeJogosH2hUnder45++;
		}
		if(trim($li->innertext) == '2-3') {
			$H2hUnder45doisAtres++;
			$totalDeJogosH2hUnder45++;
		} 
		if(trim($li->innertext) == '3-2') {
			$H2hUnder45tresAdois++;
			$totalDeJogosH2hUnder45++;
		}
		if(trim($li->innertext) == '0-5') {
			$H2hUnder45zeroAcinco++;
			$totalDeJogosH2hUnder45++;
		}
		if(trim($li->innertext) == '5-0') {
			$H2hUnder45cincoAzero++;
			$totalDeJogosH2hUnder45++;
		}

		//under 5,5
		if(trim($li->innertext) == '6-0') {
			$H2hUnder55seisAzero++;
			$totalDeJogosH2hUnder55++;
		}
		if(trim($li->innertext) == '0-6') {
			$H2hUnder55zeroAseis++;
			$totalDeJogosH2hUnder55++;
		}
		if(trim($li->innertext) == '5-1') {
			$H2hUnder55cincoAum++;
			$totalDeJogosH2hUnder55++;
		}
		if(trim($li->innertext) == '1-5') {
			$H2hUnder55umAcinco++;
			$totalDeJogosH2hUnder55++;
		}
		if(trim($li->innertext) == '2-4') {
			$H2hUnder45doisAquatro++;
			$totalDeJogosH2hUnder45++;
		} 
		if(trim($li->innertext) == '4-2') {
			$H2hUnder45quatroAdois++;
			$totalDeJogosH2hUnder45++;
		}

		//under 6,5
		if(trim($li->innertext) == '7-0') {
			$H2hUnder65seteAzero++;
			$totalDeJogosH2hUnder65++;
		}
		if(trim($li->innertext) == '0-7') {
			$H2hUnder65zeroAsete++;
			$totalDeJogosH2hUnder65++;
		}
		if(trim($li->innertext) == '1-6') {
			$H2hUnder65umAseis++;
			$totalDeJogosH2hUnder65++;
		}
		if(trim($li->innertext) == '6-1') {
			$H2hUnder65seisAum++;
			$totalDeJogosH2hUnder65++;
		}
		if(trim($li->innertext) == '2-5') {
			$H2hUnder65doisAcinco++;
			$totalDeJogosH2hUnder65++;
		}
		if(trim($li->innertext) == '5-2') {
			$H2hUnder65cincoAdois++;
			$totalDeJogosH2hUnder65++;
		}
		if(trim($li->innertext) == '4-3') {
			$H2hUnder65quatroAtres++;
			$totalDeJogosH2hUnder65++;
		}
		if(trim($li->innertext) == '3-4') {
			$H2hUnder65tresAquatro++;
			$totalDeJogosH2hUnder65++;
		}

		//under 7,5
		if(trim($li->innertext) == '8-0') {
			$H2hUnder75oitoAzero++;
			$totalDeJogosH2hUnder75++;
		}
		if(trim($li->innertext) == '0-8') {
			$H2hUnder75zeroAoito++;
			$totalDeJogosH2hUnder75++;
		}
		if(trim($li->innertext) == '1-7') {
			$H2hUnder75umAsete++;
			$totalDeJogosH2hUnder75++;
		}
		if(trim($li->innertext) == '7-1') {
			$H2hUnder75seteAum++;
			$totalDeJogosH2hUnder75++;
		}
		if(trim($li->innertext) == '6-2') {
			$H2hUnder75seisAdois++;
			$totalDeJogosH2hUnder75++;
		}
		if(trim($li->innertext) == '2-6') {
			$H2hUnder75doisAseis++;
			$totalDeJogosH2hUnder75++;
		}
		if(trim($li->innertext) == '5-3') {
			$H2hUnder75cincoAtres++;
			$totalDeJogosH2hUnder75++;
		}
		if(trim($li->innertext) == '3-5') {
			$H2hUnder75tresAcinco++;
			$totalDeJogosH2hUnder75++;
		}



		$totalDeJogosH2H++;
	}

  
  $htmlAeB = "https://www.academiadasapostasbrasil.com/stats/ajax_all_last_games/".$idControle;

	// TIME A
	$htmlTimeA = file_get_html($htmlAeB);

	$time_A_totalDeJogos = 0;
	$time_B_totalDeJogos = 0;
  //echo "<pre>";
  $tabelasTimeAeB = $htmlTimeA->find('table');
  $tabelaTimeA    = $tabelasTimeAeB[0];
  $tabelaTimeB    = $tabelasTimeAeB[1];
  
  // TIME A
  foreach($tabelaTimeA->find('td[class=stat-draw] a') as $li){
    //echo $li->innertext. '<br>';
    if(trim($li->innertext) == '0-0') {
			$time_A_Under05zeroAzero++;
			$time_A_totalDeJogosUnder05++;
			
			$time_A_Under15zeroAzero++;
			$time_A_totalDeJogosUnder15++;
		} 
		if(trim($li->innertext) == '1-1') {
			//$H2hUnder15umAum++;
			//$totalDeJogosH2hUnder05++;
			
			//1,5
			$time_A_Under15umAum++;
			$time_A_totalDeJogosUnder25++;

		}
		if(trim($li->innertext) == '2-2') {
			//$H2hUnder15doisAdois++;
			//$totalDeJogosH2hUnder05++;
			
			//3,5
			$time_A_Under35doisAdois++;
			$time_A_totalDeJogosUnder35++;
			
		}
		if(trim($li->innertext) == '3-3') {
			//$H2hUnder15tresAtres++;
			//$totalDeJogosH2hUnder05++;

			//5,5
      $time_A_Under55tresAtres++;
      $time_A_totalDeJogosUnder55++;
		}

		if(trim($li->innertext) == '4-4') {
			//$H2hUnder15tresAtres++;
			//$totalDeJogosH2hUnder05++;

			//5,5
      $time_A_Under75quatroAquatro++;
      $time_A_totalDeJogosUnder75++;
		}
		
		$time_A_totalDeJogos++;

  }
  foreach($tabelaTimeA->find('td[class=stat-lose] a') as $li){
		//echo $li->innertext . '<br>';
		//under 1,5
		if(trim($li->innertext) == '0-1') {
			$time_A_Under15zeroAum++;
			$time_A_totalDeJogosUnder15++;
		} 
		if(trim($li->innertext) == '1-0') {
			$time_A_Under15umAzero++;		
			$time_A_totalDeJogosUnder15++;
		}

		//under 2,5
		if(trim($li->innertext) == '0-3') {
			$time_A_Under25zeroAtres++;
			$time_A_totalDeJogosUnder25++;
		} 
		if(trim($li->innertext) == '3-0') {
			$time_A_Under25tresAzero++;		
			$time_A_totalDeJogosUnder25++;
		}
		if(trim($li->innertext) == '1-2') {
			$time_A_Under25umAdois++;
			$time_A_totalDeJogosUnder25++;
		} 
		if(trim($li->innertext) == '2-1') {
			$time_A_Under25doisAum++;		
			$time_A_totalDeJogosUnder25++;
		}

		//under 3,5
		if(trim($li->innertext) == '0-4') {
			$time_A_Under35zeroAquatro++;
			$time_A_totalDeJogosUnder35++;
		} 
		if(trim($li->innertext) == '4-0') {
			$time_A_Under35quatroAzero++;		
			$time_A_totalDeJogosUnder35++;
		}
		if(trim($li->innertext) == '1-3') {
			$time_A_Under35umAtres++;
			$time_A_totalDeJogosUnder35++;
		} 
		if(trim($li->innertext) == '3-1') {
			$time_A_Under35tresAum++;		
			$time_A_totalDeJogosUnder35++;
		}

		//under 4,5
		if(trim($li->innertext) == '1-4') {
			$time_A_Under45umAquatro++;
			$time_A_totalDeJogosUnder45++;
		} 
		if(trim($li->innertext) == '4-1') {
			$time_A_Under45quatroAum++;
			$time_A_totalDeJogosUnder45++;
		}
		if(trim($li->innertext) == '2-3') {
			$time_A_Under45doisAtres++;
			$time_A_totalDeJogosUnder45++;
		} 
		if(trim($li->innertext) == '3-2') {
			$time_A_Under45tresAdois++;
			$time_A_totalDeJogosUnder45++;
		}
		if(trim($li->innertext) == '0-5') {
			$time_A_Under45zeroAcinco++;
			$time_A_totalDeJogosUnder45++;
		}
		if(trim($li->innertext) == '5-0') {
			$time_A_Under45cincoAzero++;
			$time_A_totalDeJogosUnder45++;
		}

		//under 5,5
		if(trim($li->innertext) == '6-0') {
			$time_A_Under55seisAzero++;
			$time_A_totalDeJogosUnder55++;
		}
		if(trim($li->innertext) == '0-6') {
			$time_A_Under55zeroAseis++;
			$time_A_totalDeJogosUnder55++;
		}
		if(trim($li->innertext) == '5-1') {
			$time_A_Under55cincoAum++;
			$time_A_totalDeJogosUnder55++;
		}
		if(trim($li->innertext) == '1-5') {
			$time_A_Under55umAcinco++;
			$time_A_totalDeJogosUnder55++;
		}
		if(trim($li->innertext) == '2-4') {
			$time_A_Under45doisAquatro++;
			$time_A_totalDeJogosUnder45++;
		} 
		if(trim($li->innertext) == '4-2') {
			$time_A_Under45quatroAdois++;
			$time_A_totalDeJogosUnder45++;
		}

		//under 6,5
		if(trim($li->innertext) == '7-0') {
			$time_A_Under65seteAzero++;
			$time_A_totalDeJogosUnder65++;
		}
		if(trim($li->innertext) == '0-7') {
			$time_A_Under65zeroAsete++;
			$time_A_totalDeJogosUnder65++;
		}
		if(trim($li->innertext) == '1-6') {
			$time_A_Under65umAseis++;
			$time_A_totalDeJogosUnder65++;
		}
		if(trim($li->innertext) == '6-1') {
			$time_A_Under65seisAum++;
			$time_A_totalDeJogosUnder65++;
		}
		if(trim($li->innertext) == '2-5') {
			$time_A_Under65doisAcinco++;
			$time_A_totalDeJogosUnder65++;
		}
		if(trim($li->innertext) == '5-2') {
			$time_A_Under65cincoAdois++;
			$time_A_totalDeJogosUnder65++;
		}
		if(trim($li->innertext) == '4-3') {
			$time_A_Under65quatroAtres++;
			$time_A_totalDeJogosUnder65++;
		}
		if(trim($li->innertext) == '3-4') {
			$time_A_Under65tresAquatro++;
			$time_A_totalDeJogosUnder65++;
		}

		//under 7,5
		if(trim($li->innertext) == '8-0') {
			$time_A_Under75oitoAzero++;
			$time_A_totalDeJogosUnder75++;
		}
		if(trim($li->innertext) == '0-8') {
			$time_A_Under75zeroAoito++;
			$time_A_totalDeJogosUnder75++;
		}
		if(trim($li->innertext) == '1-7') {
			$time_A_Under75umAsete++;
			$time_A_totalDeJogosUnder75++;
		}
		if(trim($li->innertext) == '7-1') {
			$time_A_Under75seteAum++;
			$time_A_totalDeJogosUnder75++;
		}
		if(trim($li->innertext) == '6-2') {
			$time_A_Under75seisAdois++;
			$time_A_totalDeJogosUnder75++;
		}
		if(trim($li->innertext) == '2-6') {
			$time_A_Under75doisAseis++;
			$time_A_totalDeJogosUnder75++;
		}
		if(trim($li->innertext) == '5-3') {
			$time_A_Under75cincoAtres++;
			$time_A_totalDeJogosUnder75++;
		}
		if(trim($li->innertext) == '3-5') {
			$time_A_Under75tresAcinco++;
			$time_A_totalDeJogosUnder75++;
		}


		$time_A_totalDeJogos++;
	}
  foreach($tabelaTimeA->find('td[class=stat-win] a') as $li){
		//echo $li->innertext . '<br>';
		//under 1,5
		if(trim($li->innertext) == '0-1') {
			$time_A_Under15zeroAum++;
			$time_A_totalDeJogosUnder15++;

		} 
		if(trim($li->innertext) == '1-0') {
			$time_A_Under15umAzero++;
			$time_A_totalDeJogosUnder15++;

		}
		//under 2,5
		if(trim($li->innertext) == '0-3') {
			$time_A_Under25zeroAtres++;
			$time_A_totalDeJogosUnder25++;
		} 
		if(trim($li->innertext) == '3-0') {
			$time_A_Under25tresAzero++;		
			$time_A_totalDeJogosUnder25++;
		}
		if(trim($li->innertext) == '1-2') {
			$time_A_Under25umAdois++;
			$time_A_totalDeJogosUnder25++;
		} 
		if(trim($li->innertext) == '2-1') {
			$time_A_Under25doisAum++;		
			$time_A_totalDeJogosUnder25++;
		}

		//under 3,5
		if(trim($li->innertext) == '0-4') {
			$time_A_Under35zeroAquatro++;
			$time_A_totalDeJogosUnder35++;
		} 
		if(trim($li->innertext) == '4-0') {
			$time_A_Under35quatroAzero++;		
			$time_A_totalDeJogosUnder35++;
		}
		if(trim($li->innertext) == '1-3') {
			$time_A_Under35umAtres++;
			$time_A_totalDeJogosUnder35++;
		} 
		if(trim($li->innertext) == '3-1') {
			$time_A_Under35tresAum++;		
			$time_A_totalDeJogosUnder35++;
		}

		//under 4,5
		if(trim($li->innertext) == '1-4') {
			$time_A_Under45umAquatro++;
			$time_A_totalDeJogosUnder45++;
		} 
		if(trim($li->innertext) == '4-1') {
			$time_A_Under45quatroAum++;
			$time_A_totalDeJogosUnder45++;
		}
		if(trim($li->innertext) == '2-3') {
			$time_A_Under45doisAtres++;
			$time_A_totalDeJogosUnder45++;
		} 
		if(trim($li->innertext) == '3-2') {
			$time_A_Under45tresAdois++;
			$time_A_totalDeJogosUnder45++;
		}
		if(trim($li->innertext) == '0-5') {
			$time_A_Under45zeroAcinco++;
			$time_A_totalDeJogosUnder45++;
		}
		if(trim($li->innertext) == '5-0') {
			$time_A_Under45cincoAzero++;
			$time_A_totalDeJogosUnder45++;
		}

		//under 5,5
		if(trim($li->innertext) == '6-0') {
			$time_A_Under55seisAzero++;
			$time_A_totalDeJogosUnder55++;
		}
		if(trim($li->innertext) == '0-6') {
			$time_A_Under55zeroAseis++;
			$time_A_totalDeJogosUnder55++;
		}
		if(trim($li->innertext) == '5-1') {
			$time_A_Under55cincoAum++;
			$time_A_totalDeJogosUnder55++;
		}
		if(trim($li->innertext) == '1-5') {
			$time_A_Under55umAcinco++;
			$time_A_totalDeJogosUnder55++;
		}
		if(trim($li->innertext) == '2-4') {
			$time_A_Under45doisAquatro++;
			$time_A_totalDeJogosUnder45++;
		} 
		if(trim($li->innertext) == '4-2') {
			$time_A_Under45quatroAdois++;
			$time_A_totalDeJogosUnder45++;
		}

		//under 6,5
		if(trim($li->innertext) == '7-0') {
			$time_A_Under65seteAzero++;
			$time_A_totalDeJogosUnder65++;
		}
		if(trim($li->innertext) == '0-7') {
			$time_A_Under65zeroAsete++;
			$time_A_totalDeJogosUnder65++;
		}
		if(trim($li->innertext) == '1-6') {
			$time_A_Under65umAseis++;
			$time_A_totalDeJogosUnder65++;
		}
		if(trim($li->innertext) == '6-1') {
			$time_A_Under65seisAum++;
			$time_A_totalDeJogosUnder65++;
		}
		if(trim($li->innertext) == '2-5') {
			$time_A_Under65doisAcinco++;
			$time_A_totalDeJogosUnder65++;
		}
		if(trim($li->innertext) == '5-2') {
			$time_A_Under65cincoAdois++;
			$time_A_totalDeJogosUnder65++;
		}
		if(trim($li->innertext) == '4-3') {
			$time_A_Under65quatroAtres++;
			$time_A_totalDeJogosUnder65++;
		}
		if(trim($li->innertext) == '3-4') {
			$time_A_Under65tresAquatro++;
			$time_A_totalDeJogosUnder65++;
		}

		//under 7,5
		if(trim($li->innertext) == '8-0') {
			$time_A_Under75oitoAzero++;
			$time_A_totalDeJogosUnder75++;
		}
		if(trim($li->innertext) == '0-8') {
			$time_A_Under75zeroAoito++;
			$time_A_totalDeJogosUnder75++;
		}
		if(trim($li->innertext) == '1-7') {
			$time_A_Under75umAsete++;
			$time_A_totalDeJogosUnder75++;
		}
		if(trim($li->innertext) == '7-1') {
			$time_A_Under75seteAum++;
			$time_A_totalDeJogosUnder75++;
		}
		if(trim($li->innertext) == '6-2') {
			$time_A_Under75seisAdois++;
			$time_A_totalDeJogosUnder75++;
		}
		if(trim($li->innertext) == '2-6') {
			$time_A_Under75doisAseis++;
			$time_A_totalDeJogosUnder75++;
		}
		if(trim($li->innertext) == '5-3') {
			$time_A_Under75cincoAtres++;
			$time_A_totalDeJogosUnder75++;
		}
		if(trim($li->innertext) == '3-5') {
			$time_A_Under75tresAcinco++;
			$time_A_totalDeJogosUnder75++;
		}

    $time_A_totalDeJogos++;

  }
  
	// TIME B
  foreach($tabelaTimeB->find('td[class=stat-draw] a') as $li){
    //echo $li->innertext. '<br>';
    if(trim($li->innertext) == '0-0') {
			$time_B_Under05zeroAzero++;
			$time_B_totalDeJogosUnder05++;
			
			$time_B_Under15zeroAzero++;
			$time_B_totalDeJogosUnder15++;
		} 
		if(trim($li->innertext) == '1-1') {
			//$H2hUnder15umAum++;
			//$totalDeJogosH2hUnder05++;
			
			//1,5
			$time_B_Under15umAum++;
			$time_B_totalDeJogosUnder25++;

		}
		if(trim($li->innertext) == '2-2') {
			//$H2hUnder15doisAdois++;
			//$totalDeJogosH2hUnder05++;
			
			//3,5
			$time_B_Under35doisAdois++;
			$time_B_totalDeJogosUnder35++;
			
		}
		if(trim($li->innertext) == '3-3') {
			//$H2hUnder15tresAtres++;
			//$totalDeJogosH2hUnder05++;

			//5,5
      $time_B_Under55tresAtres++;
      $time_B_totalDeJogosUnder55++;
		}

		if(trim($li->innertext) == '4-4') {
			//$H2hUnder15tresAtres++;
			//$totalDeJogosH2hUnder05++;

			//5,5
      $time_B_Under75quatroAquatro++;
      $time_B_totalDeJogosUnder75++;
		}
		
		$time_B_totalDeJogos++;

  }
  foreach($tabelaTimeB->find('td[class=stat-lose] a') as $li){
		//echo $li->innertext . '<br>';
		//under 1,5
		if(trim($li->innertext) == '0-1') {
			$time_B_Under15zeroAum++;
			$time_B_totalDeJogosUnder15++;
		} 
		if(trim($li->innertext) == '1-0') {
			$time_B_Under15umAzero++;		
			$time_B_totalDeJogosUnder15++;
		}

		//under 2,5
		if(trim($li->innertext) == '0-3') {
			$time_B_Under25zeroAtres++;
			$time_B_totalDeJogosUnder25++;
		} 
		if(trim($li->innertext) == '3-0') {
			$time_B_Under25tresAzero++;		
			$time_B_totalDeJogosUnder25++;
		}
		if(trim($li->innertext) == '1-2') {
			$time_B_Under25umAdois++;
			$time_B_totalDeJogosUnder25++;
		} 
		if(trim($li->innertext) == '2-1') {
			$time_B_Under25doisAum++;		
			$time_B_totalDeJogosUnder25++;
		}

		//under 3,5
		if(trim($li->innertext) == '0-4') {
			$time_B_Under35zeroAquatro++;
			$time_B_totalDeJogosUnder35++;
		} 
		if(trim($li->innertext) == '4-0') {
			$time_B_Under35quatroAzero++;		
			$time_B_totalDeJogosUnder35++;
		}
		if(trim($li->innertext) == '1-3') {
			$time_B_Under35umAtres++;
			$time_B_totalDeJogosUnder35++;
		} 
		if(trim($li->innertext) == '3-1') {
			$time_B_Under35tresAum++;		
			$time_B_totalDeJogosUnder35++;
		}

		//under 4,5
		if(trim($li->innertext) == '1-4') {
			$time_B_Under45umAquatro++;
			$time_B_totalDeJogosUnder45++;
		} 
		if(trim($li->innertext) == '4-1') {
			$time_B_Under45quatroAum++;
			$time_B_totalDeJogosUnder45++;
		}
		if(trim($li->innertext) == '2-3') {
			$time_B_Under45doisAtres++;
			$time_B_totalDeJogosUnder45++;
		} 
		if(trim($li->innertext) == '3-2') {
			$time_B_Under45tresAdois++;
			$time_B_totalDeJogosUnder45++;
		}
		if(trim($li->innertext) == '0-5') {
			$time_B_Under45zeroAcinco++;
			$time_B_totalDeJogosUnder45++;
		}
		if(trim($li->innertext) == '5-0') {
			$time_B_Under45cincoAzero++;
			$time_B_totalDeJogosUnder45++;
		}

		//under 5,5
		if(trim($li->innertext) == '6-0') {
			$time_B_Under55seisAzero++;
			$time_B_totalDeJogosUnder55++;
		}
		if(trim($li->innertext) == '0-6') {
			$time_B_Under55zeroAseis++;
			$time_B_totalDeJogosUnder55++;
		}
		if(trim($li->innertext) == '5-1') {
			$time_B_Under55cincoAum++;
			$time_B_totalDeJogosUnder55++;
		}
		if(trim($li->innertext) == '1-5') {
			$time_B_Under55umAcinco++;
			$time_B_totalDeJogosUnder55++;
		}
		if(trim($li->innertext) == '2-4') {
			$time_B_Under45doisAquatro++;
			$time_B_totalDeJogosUnder45++;
		} 
		if(trim($li->innertext) == '4-2') {
			$time_B_Under45quatroAdois++;
			$time_B_totalDeJogosUnder45++;
		}

		//under 6,5
		if(trim($li->innertext) == '7-0') {
			$time_B_Under65seteAzero++;
			$time_B_totalDeJogosUnder65++;
		}
		if(trim($li->innertext) == '0-7') {
			$time_B_Under65zeroAsete++;
			$time_B_totalDeJogosUnder65++;
		}
		if(trim($li->innertext) == '1-6') {
			$time_B_Under65umAseis++;
			$time_B_totalDeJogosUnder65++;
		}
		if(trim($li->innertext) == '6-1') {
			$time_B_Under65seisAum++;
			$time_B_totalDeJogosUnder65++;
		}
		if(trim($li->innertext) == '2-5') {
			$time_B_Under65doisAcinco++;
			$time_B_totalDeJogosUnder65++;
		}
		if(trim($li->innertext) == '5-2') {
			$time_B_Under65cincoAdois++;
			$time_B_totalDeJogosUnder65++;
		}
		if(trim($li->innertext) == '4-3') {
			$time_B_Under65quatroAtres++;
			$time_B_totalDeJogosUnder65++;
		}
		if(trim($li->innertext) == '3-4') {
			$time_B_Under65tresAquatro++;
			$time_B_totalDeJogosUnder65++;
		}

		//under 7,5
		if(trim($li->innertext) == '8-0') {
			$time_B_Under75oitoAzero++;
			$time_B_totalDeJogosUnder75++;
		}
		if(trim($li->innertext) == '0-8') {
			$time_B_Under75zeroAoito++;
			$time_B_totalDeJogosUnder75++;
		}
		if(trim($li->innertext) == '1-7') {
			$time_B_Under75umAsete++;
			$time_B_totalDeJogosUnder75++;
		}
		if(trim($li->innertext) == '7-1') {
			$time_B_Under75seteAum++;
			$time_B_totalDeJogosUnder75++;
		}
		if(trim($li->innertext) == '6-2') {
			$time_B_Under75seisAdois++;
			$time_B_totalDeJogosUnder75++;
		}
		if(trim($li->innertext) == '2-6') {
			$time_B_Under75doisAseis++;
			$time_B_totalDeJogosUnder75++;
		}
		if(trim($li->innertext) == '5-3') {
			$time_B_Under75cincoAtres++;
			$time_B_totalDeJogosUnder75++;
		}
		if(trim($li->innertext) == '3-5') {
			$time_B_Under75tresAcinco++;
			$time_B_totalDeJogosUnder75++;
		}


		$time_B_totalDeJogos++;
	}
  foreach($tabelaTimeB->find('td[class=stat-win] a') as $li){
		//echo $li->innertext . '<br>';
		//under 1,5
		if(trim($li->innertext) == '0-1') {
			$time_B_Under15zeroAum++;
			$time_B_totalDeJogosUnder15++;

		} 
		if(trim($li->innertext) == '1-0') {
			$time_B_Under15umAzero++;
			$time_B_totalDeJogosUnder15++;

		}
		//under 2,5
		if(trim($li->innertext) == '0-3') {
			$time_B_Under25zeroAtres++;
			$time_B_totalDeJogosUnder25++;
		} 
		if(trim($li->innertext) == '3-0') {
			$time_B_Under25tresAzero++;		
			$time_B_totalDeJogosUnder25++;
		}
		if(trim($li->innertext) == '1-2') {
			$time_B_Under25umAdois++;
			$time_B_totalDeJogosUnder25++;
		} 
		if(trim($li->innertext) == '2-1') {
			$time_B_Under25doisAum++;		
			$time_B_totalDeJogosUnder25++;
		}

		//under 3,5
		if(trim($li->innertext) == '0-4') {
			$time_B_Under35zeroAquatro++;
			$time_B_totalDeJogosUnder35++;
		} 
		if(trim($li->innertext) == '4-0') {
			$time_B_Under35quatroAzero++;		
			$time_B_totalDeJogosUnder35++;
		}
		if(trim($li->innertext) == '1-3') {
			$time_B_Under35umAtres++;
			$time_B_totalDeJogosUnder35++;
		} 
		if(trim($li->innertext) == '3-1') {
			$time_B_Under35tresAum++;		
			$time_B_totalDeJogosUnder35++;
		}

		//under 4,5
		if(trim($li->innertext) == '1-4') {
			$time_B_Under45umAquatro++;
			$time_B_totalDeJogosUnder45++;
		} 
		if(trim($li->innertext) == '4-1') {
			$time_B_Under45quatroAum++;
			$time_B_totalDeJogosUnder45++;
		}
		if(trim($li->innertext) == '2-3') {
			$time_B_Under45doisAtres++;
			$time_B_totalDeJogosUnder45++;
		} 
		if(trim($li->innertext) == '3-2') {
			$time_B_Under45tresAdois++;
			$time_B_totalDeJogosUnder45++;
		}
		if(trim($li->innertext) == '0-5') {
			$time_B_Under45zeroAcinco++;
			$time_B_totalDeJogosUnder45++;
		}
		if(trim($li->innertext) == '5-0') {
			$time_B_Under45cincoAzero++;
			$time_B_totalDeJogosUnder45++;
		}

		//under 5,5
		if(trim($li->innertext) == '6-0') {
			$time_B_Under55seisAzero++;
			$time_B_totalDeJogosUnder55++;
		}
		if(trim($li->innertext) == '0-6') {
			$time_B_Under55zeroAseis++;
			$time_B_totalDeJogosUnder55++;
		}
		if(trim($li->innertext) == '5-1') {
			$time_B_Under55cincoAum++;
			$time_B_totalDeJogosUnder55++;
		}
		if(trim($li->innertext) == '1-5') {
			$time_B_Under55umAcinco++;
			$time_B_totalDeJogosUnder55++;
		}
		if(trim($li->innertext) == '2-4') {
			$time_B_Under45doisAquatro++;
			$time_B_totalDeJogosUnder45++;
		} 
		if(trim($li->innertext) == '4-2') {
			$time_B_Under45quatroAdois++;
			$time_B_totalDeJogosUnder45++;
		}

		//under 6,5
		if(trim($li->innertext) == '7-0') {
			$time_B_Under65seteAzero++;
			$time_B_totalDeJogosUnder65++;
		}
		if(trim($li->innertext) == '0-7') {
			$time_B_Under65zeroAsete++;
			$time_B_totalDeJogosUnder65++;
		}
		if(trim($li->innertext) == '1-6') {
			$time_B_Under65umAseis++;
			$time_B_totalDeJogosUnder65++;
		}
		if(trim($li->innertext) == '6-1') {
			$time_B_Under65seisAum++;
			$time_B_totalDeJogosUnder65++;
		}
		if(trim($li->innertext) == '2-5') {
			$time_B_Under65doisAcinco++;
			$time_B_totalDeJogosUnder65++;
		}
		if(trim($li->innertext) == '5-2') {
			$time_B_Under65cincoAdois++;
			$time_B_totalDeJogosUnder65++;
		}
		if(trim($li->innertext) == '4-3') {
			$time_B_Under65quatroAtres++;
			$time_B_totalDeJogosUnder65++;
		}
		if(trim($li->innertext) == '3-4') {
			$time_B_Under65tresAquatro++;
			$time_B_totalDeJogosUnder65++;
		}

		//under 7,5
		if(trim($li->innertext) == '8-0') {
			$time_B_Under75oitoAzero++;
			$time_B_totalDeJogosUnder75++;
		}
		if(trim($li->innertext) == '0-8') {
			$time_B_Under75zeroAoito++;
			$time_B_totalDeJogosUnder75++;
		}
		if(trim($li->innertext) == '1-7') {
			$time_B_Under75umAsete++;
			$time_B_totalDeJogosUnder75++;
		}
		if(trim($li->innertext) == '7-1') {
			$time_B_Under75seteAum++;
			$time_B_totalDeJogosUnder75++;
		}
		if(trim($li->innertext) == '6-2') {
			$time_B_Under75seisAdois++;
			$time_B_totalDeJogosUnder75++;
		}
		if(trim($li->innertext) == '2-6') {
			$time_B_Under75doisAseis++;
			$time_B_totalDeJogosUnder75++;
		}
		if(trim($li->innertext) == '5-3') {
			$time_B_Under75cincoAtres++;
			$time_B_totalDeJogosUnder75++;
		}
		if(trim($li->innertext) == '3-5') {
			$time_B_Under75tresAcinco++;
			$time_B_totalDeJogosUnder75++;
		}

    $time_B_totalDeJogos++;

  }

	$tBtotalDeJogos = 0;
	


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
