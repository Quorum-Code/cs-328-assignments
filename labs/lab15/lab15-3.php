<?php
/*===== Sean Ross & Evan Putnam CS328 Lab 15 4/5/2023 ===*/

$myXml = simplexml_load_file("lab15-1.xml");
$myJSON = file_get_contents("lab15-2.json");
$phpVersion = json_decode($myJSON, true);

?>
	<h1>Color Options</h1>
	<h2>Color 1</h2>
	<p><?= $myXml->color_table->color1 ?></p>
	<h2>Color 2</h2>
	<p><?= $myXml->color_table->color2 ?></p>
	<h2>Color 3</h2>
	<p><?= $myXml->color_table->color3 ?></p>
		<h2>Year</h2>
	<p><?= $myXml->year ?></p>

	<hr/>

	<h1>My Car</h1>
	<h2>Color</h2>
	<p><?= $phpVersion["color"] ?></p>
	<h2>Model</h2>
	<p><?= $phpVersion['model'] ?></p>
	<h2>Make</h2>
	<p><?= $phpVersion['make'] ?></p>
	<h2>Year</h2>
	<p><?= $phpVersion['year'] ?></p>
	<h2>MPG</h2>
	<p><?= $phpVersion['mpg'] ?></p>
