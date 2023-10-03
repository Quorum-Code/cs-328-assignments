<?php
if($conn !== null)
{
   $loc_id = strip_tags($_POST['loc_id']);
   $loc_str = 'begin :result := num_sightings_by_loc_id(:loc_id); end;';
   $loc_stmt = oci_parse($conn, $loc_str);

   oci_bind_by_name($loc_stmt, ':loc_id', $loc_id, 20);
   oci_bind_by_name($loc_stmt, ':result', $result, 20);
   oci_execute($loc_stmt);
   
?>

   <p> The number of sightings at that location is... <?= $result ?> </p>

<?php

        oci_free_statement($loc_stmt);
        oci_close($conn);

}
?>
