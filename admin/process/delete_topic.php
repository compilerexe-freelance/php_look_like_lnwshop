<?php
  session_start();
  include('../db_config.php');
  $id = $_GET['id'];
  $sql = "DELETE FROM tb_webboard WHERE id = $id";
  mysqli_query($conn, $sql);
  $_SESSION['delete_topic'] = 'success';
  header( "location: http://localhost/shop/admin/delete_topic.php" );
  exit(0);
?>
