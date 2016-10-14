<?php

  $localhost  = 'localhost';
  $db_user    = 'root';
  $db_pass    = '123456789';
  $db_name    = 'shop';

  // Create connection
  $conn = new mysqli($localhost, $db_user, $db_pass, $db_name);
  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }

?>
