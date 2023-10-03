<?php
    /*=====
        function: request_login
        purpose: expects no parameters, and makes a form to
                 ask for username and password

        requires: name-pwd-fieldset.html

    by: Sean Ross, Evan Putnam
    last modified: 2023-4-13
    ===*/

    function request_login()
    {
        ?>
        <form method="post" action="<?= htmlentities($_SERVER['PHP_SELF'],ENT_QUOTES) ?>">

        <?php require_once("name-pwd-fieldset.html"); ?>


        <input type="submit" name="submit"/>
        </form>

        <?php
    }
?>