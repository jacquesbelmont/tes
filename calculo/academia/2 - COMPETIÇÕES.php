<p>TABELA - TIME A</p>



<?php
include('../../simple_html_dom.php');


//CÓDIGO DO HTML ABAIXO
$str = <<<HTML




HTML;

$html = str_get_html($str);


/////////////////////////////////////**************************///////////////////
//todos os jogos
echo"TODOS OS JOGOS - TIME A (CASA)". '<br>';
foreach($html->find('td[class=stat-draw]') as $li){
        echo $li->innertext . '<br>';

}
foreach($html->find('td[class=stat-lose]') as $li){
        echo $li->innertext . '<br>';

}
foreach($html->find('td[class=stat-win]') as $li){
        echo $li->innertext . '<br>';

}
/////////////////////////////////////**************************/////////////////////
echo "JOGOS (CASA() GANHOU " . '<br>' ;
////time da CASA código para coletar jogos GANHOS
foreach($html->find('td[class=stat-win]') as $li){
        echo $li->innertext . '<br>';
}

echo "JOGOS (CASA) PERDEU " . '<br>' ;
////time da CASA código para coletar jogos GANHOS
foreach($html->find('td[class=stat-lose]') as $li){
        echo $li->innertext . '<br>';
}


///////////////////////////////********************///////////////////////////////



echo"*********************************************";
echo'<BR>';




//CÓDIGO DO HTML ABAIXO
$str = <<<HTML





HTML;

$html2 = str_get_html($str);


/////////////////////////////////////**************************///////////////////
//todos os jogos
echo"TODOS OS JOGOS - TIME B". '<br>';
foreach($html2->find('td[class=stat-draw]') as $li){
        echo $li->innertext . '<br>';

}
foreach($html2->find('td[class=stat-lose]') as $li){
        echo $li->innertext . '<br>';

}
foreach($html2->find('td[class=stat-win]') as $li){
        echo $li->innertext . '<br>';

}
/////////////////////////////////////**************************/////////////////////
echo "JOGOS TIME B GANHOU " . '<br>' ;
////time da CASA código para coletar jogos GANHOS
foreach($html2->find('td[class=stat-win]') as $li){
        echo $li->innertext . '<br>';
}

echo "JOGOS TIME B PERDEU " . '<br>' ;
////time da CASA código para coletar jogos GANHOS
foreach($html2->find('td[class=stat-lose]') as $li){
        echo $li->innertext . '<br>';
}


///////////////////////////////********************///////////////////////////////

?> 