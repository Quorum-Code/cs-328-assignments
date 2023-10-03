<?php

if($conn !== null)
{
   $loc_str = 'SELECT DISTINCT loc_name, l.loc_id
               FROM location l, sighting s
               WHERE s.loc_id = l.loc_id
               ORDER BY l.loc_id';
 
   $loc_stmt = oci_parse($conn, $loc_str);

   oci_execute($loc_stmt, OCI_DEFAULT);

?>
   <form method="post" action="<?= htmlentities($_SERVER['PHP_SELF'], ENT_QUOTES) ?>">
      <fieldset>
      <legend> Please select the location you want to know more about... </legend>

      <label for="publisher"> Location Name: </label>
      <select name="loc_id" id="loc_id">

      <?php
         while (oci_fetch($loc_stmt))
         {
            $loc_name = oci_result($loc_stmt, 1);
            $loc_id = oci_result($loc_stmt, 2);

            ?>
               <option value="<?= $loc_id ?>"> <?= $loc_id ?> : <?= $loc_name ?>  </option>
            <?php

         }
      ?>

      </select>

      <input type="submit" value="Select" />

      </fieldset>
   </form>

<?php
        oci_free_statement($loc_stmt);
        oci_close($conn);
}
?>
