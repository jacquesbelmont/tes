<p>FLASHSCORE</p>
<br>


<?php
include('../../simple_html_dom.php');


//CÓDIGO DO HTML ABAIXO
$str = <<<HTML




HTML;

$html = str_get_html($str);

echo "TODOS OS JOGOS DO TIME A" .'<BR>';
foreach($html->find('td span[class="score"]') as $li){
	echo str_replace([":", " : "], "-", $li);
        echo '<br>';

}

echo "TODOS OS JOGOS DO TIME VENCEU, EMPATOU E PERDEU" .'<BR>';
foreach($html->find(' td.winLose > A') as $li){
	echo str_replace([":", " : "], "-", $li);
        echo '<br>';

}

echo '<BR>';


//CÓDIGO DO HTML ABAIXO
$str2 = <<<HTML




HTML;

$html2 = str_get_html($str2);

echo "TODOS OS JOGOS DO TIME B" .'<BR>';
foreach($html2->find('td span[class="score"]') as $li){
	echo str_replace([":", " : "], "-", $li);
        echo '<br>';

}


echo "TODOS OS JOGOS DO TIME VENCEU, EMPATOU E PERDEU" .'<BR>';
foreach($html2->find(' td.winLose > A') as $li){
	echo str_replace([":", " : "], "-", $li);
        echo '<br>';

}



echo '<BR>';

$str3 = <<<HTML




HTML;

$html3 = str_get_html($str3);

echo "H2H" .'<BR>';
foreach($html3->find('td span[class="score"]') as $li){
	echo str_replace([":", " : "], "-", $li);
        echo '<br>';

}




?> 