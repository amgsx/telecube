<?php
require("init.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include($_SERVER["DOCUMENT_ROOT"]."/includes/meta.php");?>
    <?php include($_SERVER["DOCUMENT_ROOT"]."/includes/title.php");?>
    <?php include($_SERVER["DOCUMENT_ROOT"]."/includes/css.php");?>

  </head>
  <body>
    <?php include($_SERVER["DOCUMENT_ROOT"]."/includes/top-menu.php");?>

    <div class="container">

      <h1>Hello, Telecube PBX!</h1>
      <a href="/logout.php">Logout</a>
    

    </div>

    <?php include($_SERVER["DOCUMENT_ROOT"]."/includes/js.php");?>
  
  </body>
</html>