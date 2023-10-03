<?php
if($conn !== null)
{
   $isbn = strip_tags($_POST['isbn']);
   $isbn_str = 'begin :result := title_total_cost(:isbn); end;';
   $isbn_stmt = oci_parse($conn, $isbn_str);

   oci_bind_by_name($isbn_stmt, ':isbn', $isbn, 20);
   oci_bind_by_name($isbn_stmt, ':result', $result, 20);
   oci_execute($isbn_stmt);
   
?>

   <p> The total cost of the title is... <?= $result ?> </p>

<?php

        oci_free_statement($isbn_stmt);
        oci_close($conn);

}
?>
