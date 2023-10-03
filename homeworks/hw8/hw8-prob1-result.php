<?php

if($conn !== null)
{
   $publisher = htmlspecialchars($_POST['publisher']);

   $pub_str = 'SELECT PUB_ID, PUB_NAME, PUB_CITY, PUB_STATE
               FROM publisher p
               WHERE PUB_NAME = :publisher';
 
   $pub_stmt = oci_parse($conn, $pub_str);
   oci_bind_by_name($pub_stmt, ':publisher', $publisher, 20);

   oci_execute($pub_stmt, OCI_DEFAULT);

?>
        <table>
        <caption> Publisher Info </caption>
        <tr> <th scope="col"> Publisher ID </th>
             <th scope="col"> Name </th>
             <th scope="col"> City </th> 
             <th scope="col"> State </th> </tr>


        <?php
        while (oci_fetch($pub_stmt))
        {
            $pub_id = oci_result($pub_stmt, 1);
            $pub_name = oci_result($pub_stmt, 2);
            $pub_city = oci_result($pub_stmt, 3);
            $pub_state = oci_result($pub_stmt, 4);

            ?>

            <tr> <td> <?= $pub_id ?> </td>
                 <td> <?= $pub_name ?> </td>
                 <td> <?= $pub_city ?> </td>
                 <td> <?= $pub_state ?> </td> </tr>
            <?php
        }
        ?>
        </table>
<?php
        oci_free_statement($pub_stmt);
        oci_close($conn);

}
else
{
?>
   <p> hw8-prob1-result.php unable to use $conn... </p>
<?php
}
?>
