#!/usr/bin/php -d log_error=Off
<?php
  $ROOT = "/var/www/bugtrack";
  include($ROOT . "/library.php");
  include($ROOT . "/db_conf.php");
  $DEFAULT_USER = $_SERVER['USER'];
  
  $tableName = "bug";
  $columnScheme = "id,productId,typeof,subject";
  $whereValue = "state >=1 AND state <=3 ORDER BY id DESC LIMIT 4";
  $result = dbQuery($connection, $tableName, $columnScheme, $whereValue);
  if ( mysqli_num_rows($result) > 0 ) {
    while ( $row = mysqli_fetch_row($result) ) {
      $btli="<li><a href=\"https://bugtrack.morketsmerke.org/?p=comments&bid=" . $row[0] . "\">#" . $row[0] . "</a>";

      $tableName = "product";
      $columnScheme = "name";
      $whereValue = "id = " . $row[1];
      $result2 = dbQuery($connection, $tableName, $columnScheme, $whereValue);
      $prodName = getFieldValue($result2);
        
      $btli= $btli . " - " . $prodName . " - " . $row[2] . " - " . $row[3] . "</li>";
      echo "\t" . $btli . "\n";
    }
  }
?>
