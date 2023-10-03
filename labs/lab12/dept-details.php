<?php
    /*---
        NEEEEEED this to use PHP sessions!
        put at the BEGINNING of each PHP document using $_SESSION
    ---*/
    // session_destroy();
    session_start();
?>

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">

<!--

    by: Sean Ross, Evan Putnam
    last modified: 2023-4-13

    you can run this using the URL: https://nrs-projects.humboldt.edu/~sr407/328lab12/dept-details.php

-->

<head>
    <title> Dept-Details Lab12 </title>
    <meta charset="utf-8" />

    <?php
        /* bring in some needed PHP functions */
        
        require_once("request_login.php");
        require_once("request_dept.php");
        require_once("dept_info.php");
        // require_once("complain_and_exit.php");
    ?>

    <link href="https://nrs-projects.humboldt.edu/~st10/styles/normalize.css"
          type="text/css" rel="stylesheet" />

</head>

<body>

    <h1> Dept-Details </h1>
    <h2>Sean Ross, Evan Putnam</h2>

    <?php
    if (! array_key_exists("next_state", $_SESSION) || $_SERVER['REQUEST_METHOD'] == 'GET')
    {
        request_login();
        $_SESSION["next_state"] = "dropdown";
    }
    elseif ($_SESSION["next_state"] == "dropdown")
    {
        request_dept();
        $_SESSION["next_state"] = "info";
    }
    elseif ($_SESSION["next_state"] == "info")
    {
        dept_info();
        session_destroy();
    }
    else
    {
        ?> <p>error!</p><?php
        session_destroy();
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