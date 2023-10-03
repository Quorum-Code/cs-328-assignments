<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">

<!--
    demo of form validation using JavaScript

    adapted by: Evan Putnam, Sean Ross, David Judy
    last modified: 2023-04-20/21

    can run using the URL:
    https://nrs-projects.humboldt.edu/~ebp20/lab13/328lab13-three-value.php
-->

<head>
    <title> JavaScript form validation </title>
    <meta charset="utf-8" />

    <?php
        require_once("make_three_value_form.php");
        require_once("make_three_value_response.php");
    ?>

    <link href="https://nrs-projects.humboldt.edu/~st10/styles/normalize.css"
          type="text/css" rel="stylesheet" />
    <link href="three-value-form.css"
          type="text/css" rel="stylesheet" />

    <!-- PUT YOUR JAVASCRIPT, external or internal, HERE -->
    <script src="lab13.js" type="text/javascript"></script>

    <script>
       window.onload = function()
                       {
                          formElement1 = document.getElementById("valueForm");
                          if(formElement1 != null)
                          {
                             muckButton = document.getElementById("test");
                             muckButton.onclick = change_textfield;

                             formElement1.onsubmit = allFilled;
                          }
                       }
    </script>
</head>

<body>
    <?php
    // when first called, show an enter-info form

    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        make_three_value_form();
    }

    // ...then, display form-response

    else
    {
        make_three_value_response();
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
