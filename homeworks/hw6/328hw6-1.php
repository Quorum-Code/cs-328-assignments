<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">

<!-- class HTML template: last modified 2023-03-29 -->

<!--
    by: Evan Putnam
    last modified: 3/31/2023

    you can run this using the URL:
    https://nrs-projects.humboldt.edu/~ebp20/hw6/328hw6-1.php
-->

<head>
    <title> HW 6 </title>
    <meta charset="utf-8" />

    <!-- (you can REMOVE THIS COMMENT when using this template)
         =============================================
         class style standard: you are required to link to normalize.css
         *before* your personal/additional external CSS files

         to play it safe, I linked to a copy of normalize.css I *know*
         exists, in my directory; you may change this to your local copy

         also note: CSS validator (can be used for your .css files):
         https://jigsaw.w3.org/css-validator/
    -->

    <link href="https://nrs-projects.humboldt.edu/~st10/styles/normalize.css"
          type="text/css" rel="stylesheet" />

</head>

<body>
    
    <h1> Homework 6 </h1>

    <h2> Evan Putnam </h2>

    <form action="https://nrs-projects.humboldt.edu/~ebp20/hw6/328hw6-1.php" method="POST" target="_blank">
         <fieldset>
             <input type="number" name="num" />

             <input type="time" name="time" />

             <input type="submit" />
         </fieldset>        
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $i = 0;
        while($i < htmlspecialchars($_POST["num"]))
        {
            $i++;
            ?>
            <p> <?= htmlspecialchars($_POST["time"])?> </p>
            <?php
        }

        ?>
            <a href="https://nrs-projects.humboldt.edu/~ebp20/hw6/328hw6-1.php"> Back to original form </a>
        <?php
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
