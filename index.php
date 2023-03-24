<!DOCTYPE html>
<html>
<head>
	<title>teste</title>
</head>
<body>
	<ul>
		<?php 
			require('simple_dom/simple_html_dom.php');
			$html = file_get_html("http://mixbarato.net/nike");
			foreach ($html->find('#product-list li') as $item) {
				echo "<li><img src='".$item->find('img')[0]->src."'width='100%; height='95%'/></li>";
			}
		?>
	</ul>

</body>
</html>