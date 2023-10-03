<?php
    /*=====
        function: request_dept
        purpose: expects username/password, 
        grab the username and password from the submitted login form
        – SAVE these as the values of suitable session attributes in $_SESSION!
        – USE them to query department names (and department numbers if desired) from the dept table,
        building a form including a select (drop-down) element that allows the user to choose a desired
        department.

    by: Sean Ross, Evan Putnam
    last modified: 2023-4-13
    ===*/
    require_once("hsu_conn_sess.php");

    function request_dept()
    {
        
        $username = strip_tags($_POST['username']);
        $password = strip_tags($_POST['password']);

        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;

        $conn = hsu_conn_sess($username,$password);

        $dept_str = "select dept_name
                        from dept";

        $dept_stmt = oci_parse($conn, $dept_str);
        oci_execute($dept_stmt);
        ?>
        <form method="post" action="<?= htmlentities($_SERVER['PHP_SELF'],ENT_QUOTES) ?>">
        <label for="dropdown"> Choose a Department: </label>

        <select name="dropdown">
            <?php
                while(oci_fetch($dept_stmt))
                {
                    $dept_name = oci_result($dept_stmt, 1);
                
            ?>
                <option value="<?= $dept_name ?>"><?= $dept_name ?></option>

            <?php 
                }
            ?>

            
        </select>

        <input type="submit" name="submit"/>
    </form>

        <?php

        oci_free_statement($dept_stmt);
        oci_close($conn);
        
    }
?>