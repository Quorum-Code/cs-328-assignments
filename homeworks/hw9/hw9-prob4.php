<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">

<!-- class HTML template: last modified 2023-03-29 -->

<!--
    by: Evan Putnam
    last modified: 5/4/2023

    you can run this using the URL:
    https://nrs-projects.humboldt.edu/~ebp20/328hw/hw9/hw9-prob4.php
-->

<head>
    <title> HW 9 - Problem 4 </title>
    <meta charset="utf-8" />

    <link href="https://nrs-projects.humboldt.edu/~st10/styles/normalize.css" type="text/css" rel="stylesheet" />
    <link href="hw9.css" type="text/css" rel="stylesheet" />

    <script src="hw9-prob4.js" type="text/javascript" async="async"> </script>
    
<?php
    require_once('hsu_conn.php');
    session_start();
?>
</head>


<body>

    <h1> Howard's Horrors - Title Total Cost and Popular Book Popup </h1>
    <h2> by Evan Putnam </h2>

<?php
// Check to start session with new username/password
if( $_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['username']) && isset($_POST['password']) )
{
      $username = strip_tags($_POST["username"]);
      $password = strip_tags($_POST["password"]);

      $_SESSION['username'] = $username;
      $_SESSION['password'] = $password;
}
// Otherwise display login form
else if(!isset($_SESSION['username']) || !isset($_SESSION['password']))
{
   require_once('hw9-prob4-login.php');
}

// Validate session username/password and connection
if(isset($_SESSION) && isset($_SESSION["username"]) && isset($_SESSION["password"]))
{
   $username = strip_tags($_SESSION["username"]);
   $password = strip_tags($_SESSION["password"]);

   $conn = hsu_conn($username, $password);

   // CONN is bad!!!
   if($conn === null)
   {
      session_destroy();
   }
   // CONN is good! Do stuff!
   else
   {
      if(isset($_POST["isbn"]))
      {
         // Display results
         require_once('hw9-prob4-result.php');
      }
      else 
      {
         // Display options
         require_once('hw9-prob4-select.php');
      }
   }
}

?>
    <footer>
    <hr />

    <input id="popButton" type="button" value="Show Popular Book" >

    <p>
        Reset form by clicking <a href=" <?= htmlentities($_SERVER['PHP_SELF'], ENT_QUOTES) ?> ">here</a>.
    </p>

    <p>
        Validate by pasting .xhtml copy's URL into<br />
        <a href="https://html5.validator.nu/">
            https://html5.validator.nu/
        </a>
    </p>
    </footer>
</body>
</html>
