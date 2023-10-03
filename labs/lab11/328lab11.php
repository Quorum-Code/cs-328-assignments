<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">

<!-- class HTML template: last modified 2023-03-29 -->

<!--
    by: Evan Putnam, Sean Ross
    last modified: 4/6/2023

    you can run this using the URL:
    https://nrs-projects.humboldt.edu/~ebp20/lab11/328lab11.php    
-->

<head>
    <title> Lab 11 </title>
    <meta charset="utf-8" />

    <link href="https://nrs-projects.humboldt.edu/~st10/styles/normalize.css"
          type="text/css" rel="stylesheet" />

    <?php 
        require_once './make_empl_form.php';
        require_once './hsu_conn.php';
    ?>

</head>

<body>
    <h1> Lab 11 </h1>

    <h2> Evan Putnam, Sean Ross </h2>

    <?php 
        if ($_SERVER["REQUEST_METHOD"] == "GET")
        {
            make_empl_form();
        }
        else
        {
            $username = strip_tags($_POST["username"]);
            $password = $_POST["password"];

            $conn = hsu_conn($username, $password);

            $to_term = strip_tags($_POST["empl_to_term"]);
            $final_count;

            $count_call_str = "BEGIN :count := count_empl(:to_term); END;";
            $count_call_stmt = oci_parse($conn, $count_call_str);

            oci_bind_by_name($count_call_stmt, ":to_term", $to_term, 20);
            oci_bind_by_name($count_call_stmt, ":count", $final_count, 1);
            
            oci_execute($count_call_stmt);

            if ($final_count == 1)
            {
               $term_call_str = "BEGIN terminate_empl(:to_term); END;";
               $term_call_stmt = oci_parse($conn, $term_call_str);

               oci_bind_by_name($term_call_stmt, ":to_term", $to_term, 20);

               oci_execute($term_call_stmt);

               ?>
                   <p> Employee with last name: <?= $to_term ?>, terminated. </p>
               <?php
               oci_free_statement($term_call_stmt);
            }
            elseif ($final_count == 0)
            {
               ?>
                   <p> No employee found with last name: <?= $to_term ?> </p>
               <?php
            }
            elseif ($final_count > 1) 
            {
               ?>
                   <p> Multiple employees found with last name: <?= $to_term ?> </p>
               <?php
            }

            $for_raise = strip_tags($_POST["empl_for_raise"]);
            $raise_amount = strip_tags($_POST["raise_amount"]);

            $count_call_str = "BEGIN :count := count_empl(:for_raise); END;";
            $count_call_stmt = oci_parse($conn, $count_call_str);

            oci_bind_by_name($count_call_stmt, ":for_raise", $for_raise, 20);
            oci_bind_by_name($count_call_stmt, ":count", $final_count, 1);
            
            oci_execute($count_call_stmt);

            if ($final_count >= 1)
            {
               $raise_call_str = "UPDATE empl
                                  SET salary = salary + salary * :raise_amount * .01
                                  WHERE empl_last_name = :for_raise";
               $raise_call_stmt = oci_parse($conn, $raise_call_str);

               oci_bind_by_name($raise_call_stmt, ":for_raise", $for_raise, 20);
               oci_bind_by_name($raise_call_stmt, ":raise_amount", $raise_amount, 4);

               oci_execute($raise_call_stmt);

               ?>
                   <p> Employee(s) with last name: <?= $for_raise ?>, salary increased by: <?= $raise_amount ?>%. </p>
               <?php

               oci_free_statement($raise_call_stmt);
            }
            elseif ($final_count == 0)
            {
               ?>
                   <p> No employee found with last name: <?= $for_raise ?> </p>
               <?php
            }

            oci_commit($conn);

            oci_free_statement($count_call_stmt);

            oci_close($conn);
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
