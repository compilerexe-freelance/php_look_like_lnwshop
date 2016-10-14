<?php
  session_start();
  include('../db_config.php');
  $id = $_POST['id'];
  $username = $_POST['username'];
  $password = $_POST['password'];
  $sql = "UPDATE tb_user SET username = '$username', password = '$password' WHERE id = $id";
  mysqli_query($conn, $sql);
  $_SESSION['update_admin'] = 'success';
  header( "location: http://localhost/shop/admin/access_edit.php" );
  exit(0);
?>
