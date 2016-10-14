<?php
  session_start();
  include('../db_config.php');
  $id = $_GET['id'];
  $sql = "DELETE FROM tb_user WHERE id = $id";
  mysqli_query($conn, $sql);
  $_SESSION['delete_admin'] = 'success';
  header( "location: http://localhost/shop/admin/access_delete.php" );
  exit(0);
?>
