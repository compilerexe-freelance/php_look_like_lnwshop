<?php
  session_start();
  include('../db_config.php');
  $username = $_POST['username'];
  $password = $_POST['password'];
  $sql = "INSERT INTO tb_user (username, password) VALUES('$username', '$password')";
  mysqli_query($conn, $sql);
  $_SESSION['insert_admin'] = 'success';
  header( "location: http://localhost/shop/admin/access.php" );
  exit(0);
?>
