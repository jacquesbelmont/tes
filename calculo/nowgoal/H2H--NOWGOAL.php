<p>TABELA H2H </p>

<?php
include('../../simple_html_dom.php');


$str = <<<HTML




HTML;

$html = str_get_html($str);

/////////////////////////////////////**************************///////////////////
//todos os jogos
echo "H2H - SCORE (1ª TEMPO)" . '<br>' ;
////time da CASA código para coletar jogos GANHOS
foreach($html->find('tr> td.red2') as $li){
        echo $li->innertext . '<br>';
}
echo"H2H - HT (1ª TEMPO)". '<br>';
foreach($html->find('tr > td[5][bgcolor=#FFFFFF]') as $li){
        echo $li->innertext . '<br>';
}

///////////////////////////////********************///////////////////////////////

?> 