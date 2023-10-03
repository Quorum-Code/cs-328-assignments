<?php
    /*=====
        function: dept_info
        purpose: grab the username and password using their session attributes in $_SESSION
– attempt to SAFELY grab the chosen department from the submitted choose-department form
– USE this chosen department a query (carefully built using a BIND VARIABLE for the submitted
department) to obtain:
– the department's location
– the number of employees who work in that department
– the maximum salary of those who work in that department
– display this queried information to the screen in a reasonable manner
– and then include a link TO your dept-details.php, so the user can conveniently start over if they
would like.

    by: Sean Ross, Evan Putnam
    last modified: 2023-4-13
    ===*/

    function dept_info()
    {
        if(! array_key_exists("dropdown", $_POST))
        {
        ?> <p>error! no department!</p> <?php
        session_destroy();
        }
        $dept = strip_tags($_POST['dropdown']);

        $conn = hsu_conn_sess($_SESSION['username'],$_SESSION['password']);

        $dept_str = "select dept_loc, count(*), max(salary)
                     from dept d, empl e
                     where d.dept_num = e.dept_num
                           and d.dept_name = :dept_name_choice
                     group by dept_loc";

        $dept_stmt = oci_parse($conn, $dept_str);

        oci_bind_by_name($dept_stmt, ":dept_name_choice", $dept);

        oci_execute($dept_stmt,OCI_DEFAULT);

        oci_fetch($dept_stmt);
        ?>
        
        <table style="border:black solid thin;">
            <caption>Department Info</caption>
            <tr> <th scope ="col"> Department Location </th>
                <th scope ="col"> Number of Employees </th>
                <th scope ="col"> Maximum Salary </th>
            </tr>
            <tr>
                <td> <?= oci_result($dept_stmt, 1) ?></td>
                <td> <?= oci_result($dept_stmt, 2) ?></td>
                <td> <?= oci_result($dept_stmt, 3) ?></td>
            </tr>
        </table>

        


        <?php

        oci_free_statement($dept_stmt);
        oci_close($conn);

        ?> 
        <a href="https://nrs-projects.humboldt.edu/~sr407/328lab12/dept-details.php">Return to Start </a>
        <?php
        
    }
?>