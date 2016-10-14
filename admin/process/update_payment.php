<?php
  session_start();
  include('../db_config.php');
  $id = $_GET['id'];
  $sql = "UPDATE tb_payment SET status = 1 WHERE id = $id";
  mysqli_query($conn, $sql);
  $_SESSION['update_payment'] = 'success';
  header( "location: http://localhost/shop/admin/confirm_payment.php" );
  exit(0);
?>
