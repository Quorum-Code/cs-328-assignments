<?php

if($conn !== null)
{
   $ttl_info_str = 'SELECT TTL_NAME, TTL_ISBN
                    FROM title t
                    ORDER BY TTL_NAME';
 
   $ttl_info_stmt = oci_parse($conn, $ttl_info_str);

   oci_execute($ttl_info_stmt, OCI_DEFAULT);

?>
   <form method="post" action="<?= htmlentities($_SERVER['PHP_SELF'], ENT_QUOTES) ?>">
      <fieldset>
      <legend> Please select a title you want to know more about... </legend>

      <label for="publisher"> Title: </label>
      <select name="isbn" id="isbn">

      <?php
         while (oci_fetch($ttl_info_stmt))
         {
            $ttl_name = oci_result($ttl_info_stmt, 1);
            $ttl_isbn = oci_result($ttl_info_stmt, 2);

            ?>
               <option value="<?= $ttl_isbn ?>"> <?= $ttl_name ?> : <?= $ttl_isbn ?>  </option>
            <?php

         }
      ?>

      </select>

      <input type="submit" value="Select" />

      </fieldset>
   </form>

<?php
        oci_free_statement($ttl_info_stmt);
        oci_close($conn);
}
?>
