<?php

if($conn !== null)
{
   $pub_name_str = 'SELECT PUB_NAME
                    FROM publisher p';
 
   $pub_name_stmt = oci_parse($conn, $pub_name_str);

   oci_execute($pub_name_stmt, OCI_DEFAULT);

?>
   <form method="post" action="<?= htmlentities($_SERVER['PHP_SELF'], ENT_QUOTES) ?>">
      <fieldset>
      <legend> Please select a publisher you want to know more about... </legend>

      <label for="publisher"> Publisher Name: </label>
      <select name="publisher" id="publisher">

      <?php
         while (oci_fetch($pub_name_stmt))
         {
            $publisher_name = oci_result($pub_name_stmt, 1);

            ?>
               <option value="<?= $publisher_name ?>"> <?= $publisher_name ?> </option>
            <?php

         }
      ?>

      </select>

      <input type="submit" value="Select" />

      </fieldset>
   </form>

<?php
        oci_free_statement($pub_name_stmt);
        oci_close($conn);
}
else
{

?>
   <p> hw8-prob1-result.php unable to use $conn... </p>
<?php
}
?>
