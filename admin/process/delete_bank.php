<?php
  session_start();
  include('../db_config.php');
  $id = $_GET['id'];
  $sql = "DELETE FROM tb_infobank WHERE id = $id";
  mysqli_query($conn, $sql);
  $_SESSION['delete_bank'] = 'success';
  header( "location: http://localhost/shop/admin/bank_info_delete.php" );
  exit(0);
?>
