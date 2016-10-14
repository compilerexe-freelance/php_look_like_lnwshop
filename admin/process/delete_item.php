<?php
  session_start();
  include('../db_config.php');
  $id = $_GET['id'];
  $sql = "DELETE FROM tb_item WHERE id = $id";
  mysqli_query($conn, $sql);
  $_SESSION['delete_item'] = 'success';
  header( "location: http://localhost/shop/admin/item_delete.php" );
  exit(0);
?>
