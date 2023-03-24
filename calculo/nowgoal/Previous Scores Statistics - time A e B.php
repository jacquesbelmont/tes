<p>TABELA time A</p>



<?php
include('../../simple_html_dom.php');


//CÓDIGO DO HTML ABAIXO
$str = <<<HTML




HTML;

$html = str_get_html($str);

/////////////////////////////////////**************************///////////////////
//todos os jogos
echo'<br>';
echo "___SCORE___";
echo'<br>';
////time da CASA código para coletar jogos GANHOS
foreach($html->find('tr> td.red2') as $li){
        echo $li->innertext . '<br>';
}
echo'<br>';
echo "___HT___";
echo'<br>';
foreach($html->find('tr > td[5]') as $li){//*[@id="tr1_1"]/td[5]
        echo $li->innertext . '<br>';
}

///////////////////////////////********************///////////////////////////////

echo'<br>';
echo'<br>';
echo'<br>';
echo'TABELA time B';
echo'<br>';

//CÓDIGO DO HTML ABAIXO
$str = <<<HTML




HTML;

$html = str_get_html($str);

/////////////////////////////////////**************************///////////////////
//todos os jogos
echo'<br>';
echo "___SCORE___";
echo'<br>';
////time da CASA código para coletar jogos GANHOS
foreach($html->find('tr> td.red2') as $li){
        echo $li->innertext . '<br>';
}
echo'<br>';
echo "___HT___";
echo'<br>';
foreach($html->find('tr > td[5]') as $li){//*[@id="tr1_1"]/td[5]
        echo $li->innertext . '<br>';
}

///////////////////////////////********************///////////////////////////////

?> 