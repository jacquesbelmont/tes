
<?php
include_once('../simple_html_dom.php');



/*function retonaTermos($tipo)
{
        $termos = 
				
				
				
        
        //apply expression
        preg_match_all("/$termos/", $string, $array, PREG_SET_ORDER);

        return $array;
}*/

function novo($url) {
	$html =  file_get_html($url);
	
	//retonaTermos('FRAGILIDADE DEFENSIVA')
	//FRAGILIDADE DEFENSIVA
	
	foreach($html->find('.preview_teamA .preview_title') as $e) 
    echo $e->outertext . '<br>';
    
  foreach($html->find('.preview_teamA .preview_body') as $e) 
    $resposta = $e->outertext . '<br>';
  
  echo $resposta;
  
  //preg_match_all('/(não)/', $resposta, $matches);
  /*preg_match_all('/(equipe afetada pelo fator casa)/', $resposta, $matches);
  
  print_r($matches);*/
    
    //preg_match_all('/(não)/', $resposta, $matches);
  /*if (strpos($html, 'equipe afetada pelo fator casa') !== false) {
    echo 'EQUIPE AFETADA FATOR CASA'. '<br>';
  }
  
  if (strpos($html, 'defesa necessita melhorar') !== false) {
    echo 'FRAGILIDADE DEFENSIVA'. '<br>';
  }
  
  if (strpos($html, 'ataque tem marcado com regularidade') !== false) {
    echo 'ATAQUE MARCA C/ REGULARIDADE'. '<br>';
  }*/
  
  $palavrasNegando = array('precisa melhorar', 'não', 'necessita melhorar');
  
  
  foreach($palavrasNegando AS $n) {
		//preg_match_all($n, $resposta, $matches);
		if ($termo = strpos($html, $n) !== false) {
			
			echo substr($html, $termo+1, 5);
			echo $n;
			echo substr($html, $termo-1, 5);
 
		}
	}
  
}


function scraping_review($url) {
    // create HTML DOM
   $html = file_get_html($url);




   // find all link
/*foreach($html1->find('#preview > div.preview_main_container.article > div.preview_container.entry > div.preview_pre_intro > div') as $e) 
    echo $e->innertext . '<br>';

foreach($html1->find('#preview > div.preview_main_container.article > div.preview_container.entry > div.preview_teamA > div') as $e) 
    echo $e->innertext . '<br>';*/



    $a = $html;
    echo "<B>EQUIPE A</B>". '<br>';

    if (strpos($a, 'medem') !== false) {
        echo 'EQUIPE AFETADA FATOR CASA'. '<br>';
    }
    if (strpos($a, 'fragilidade defensiva') !== false) {
        echo 'FRAGILIDADE DEFENSIVA - 1'. '<br>';
    }
    if(strpos($a, 'defesa necessita melhorar') !== false) {
        echo 'FRAGILIDADE DEFENSIVA - 2'. '<br>';
    }

    if (strpos($a, 'não teve as suas redes balançadas') !== false) {
        echo 'NÃO SOFREU GOL'. '<br>';
    }

    if (strpos($a, 'solidez defensiva') !== false) {
        echo 'FORÇA DEFENSIVA'. '<br>';
    }
    if (strpos($a, 'ataque tem marcado') !== false) {
        echo 'ATAQUE MARCA C/ REGULARIDADE'. '<br>';
    } else {
        echo 'ATAQUE NÃO MARCA C/ REGULARIDADE'. '<br>';
    }

    if (strpos($a, 'medem') !== false) {
        echo 'VIRAR O JOGO'. '<br>';
    }
    if (strpos($a, 'medem') !== false) {
        echo 'NÃO SER GOLEADO'. '<br>';
    }
    if (strpos($a, 'medem') !== false) {
        echo 'NÃO GOLEAR'. '<br>';
    }



    $b = $html;
    echo "<B>EQUIPE B</B>". '<br>';

    if (strpos($b, 'medem') !== false) {
        echo 'EQUIPE AFETADA FATOR CASA'. '<br>';
    }
    if (strpos($b, 'fragilidade defensiva') !== false) {
        echo 'FRAGILIDADE DEFENSIVA - 1'. '<br>';
    }
    if(strpos($b, 'defesa necessita melhorar') !== false) {
        echo 'FRAGILIDADE DEFENSIVA - 2'. '<br>';
    }

    if (strpos($b, 'não teve as suas redes balançadas') !== false) {
        echo 'NÃO SOFREU GOL'. '<br>';
    }

    if (strpos($b, 'solidez defensiva') !== false) {
        echo 'FORÇA DEFENSIVA'. '<br>';
    }
    if (strpos($b, 'ataque tem marcado') !== false) {
        echo 'ATAQUE MARCA C/ REGULARIDADE'. '<br>';
    } else {
        echo 'ATAQUE NÃO MARCA C/ REGULARIDADE'. '<br>';
    }

    if (strpos($b, 'medem') !== false) {
        echo 'VIRAR O JOGO'. '<br>';
    }
    if (strpos($b, 'medem') !== false) {
        echo 'NÃO SER GOLEADO'. '<br>';
    }
    if (strpos($b, 'medem') !== false) {
        echo 'NÃO GOLEAR'. '<br>';
    }



}



function scraping_ACADEMIA($url) {
    // create HTML DOM
   $html = file_get_html($url);

foreach($html->find('table tbody tr td.stat-win') as $e) 
   echo $e->outertext . '<br>'; 
 foreach($html->find('table tbody tr td.stat-lose') as $e) 
   echo $e->outertext . '<br>'; 
 foreach($html->find('table tbody tr td.stat-draw') as $e) 
   echo $e->outertext . '<br>'; 
}


    function scraping_FLASHSCORE($url) {
    
      $html = file_get_html($url);
      foreach($html->find('#tab-h2h-overall > div:nth-child(1) > table > tbody > tr:nth-child(1) > td:nth-child(5) > span > strong') as $e) 
      echo $e->innertext . '<br>';
    }

function scraping_NOWGOAL($url) {
    // create HTML DOM
    $html = file_get_html($url);

   // find all link
foreach($html->find('#table_v3') as $e) 
    echo $e->outertext . '<br>';
  foreach($html->find('#table_v2') as $e) 
    echo $e->outertext . '<br>';
  foreach($html->find('#table_v1') as $e) 
    echo $e->outertext . '<br>';
}


function scraping_kickoffprofits($url) {
    // create HTML DOM
    $html = file_get_html($url);

   // find all link
foreach($html->find('#table_2') as $e) 
    echo $e->outertext . '<br>';

}



//$ret = scraping_ACADEMIA('https://www.academiadasapostasbrasil.com/stats/match/servia/super-liga/vojvodina-novi-sad/cukaricki/3288773');

$ret = novo('https://www.academiadasapostasbrasil.com/stats/match/servia/super-liga/proleter-novi-sad/backa-palanka/3288782/preview');

//$ret = scraping_NOWGOAL('http://www.nowgoal.group/analysis/1784077.html');

//$ret = scraping_FLASHSCORE('https://www.flashscore.com.br/jogo/tCcxuJYK');

//$ret = scraping_kickoffprofits('http://www.kickoffprofits.com/stats/both-teams-to-score-stats-goals-galore/');



?>
