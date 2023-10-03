<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<!--
	By: 
	Last modified: 2023-Mar-23 16:22
   you can run this using this URL: 
   https://nrs-projects.humboldt.edu/~np157/lab9/328lab09-HTML.html
-->
	<head>
	<title> Lab 9 PHP </title>
		<meta charset="UTF-8"/>
		<link href="http://nrs-projects.humboldt.edu/~st10/styles/normalize.css" type="text/css" rel="stylesheet" />
	</head>
	<body> 
		<?php
        	/*=====
                	328lab09.php
                	Created by: Nathan Peralta, Even Putman, Sean Ross
                	Last modified: 2023-Mar-23 16:22
        	=====*/
        	if ( $_SERVER["REQUEST_METHOD"] == "POST")
        	{
         	?>	
			<ul>
                	<li> <?= htmlspecialchars($_POST["ice_cream_flavor"]) ?> </li>
                	<li> <?= htmlspecialchars($_POST["beverage"]) ?> </li>
                	<li> <?= htmlspecialchars($_POST["ideas"]) ?> </li>
        		</ul>
		<?php
        	}
        	else
        	{
                	require_once "./328lab09-form.txt";
        	}
		?> 
    <footer>
    <hr />

    <p>
        Validate by pasting .xhtml copy's URL into<br />
        <a href="https://html5.validator.nu/">
            https://html5.validator.nu/
        </a>
    </p>
    </footer>

</body>
</html>
