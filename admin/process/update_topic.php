<?php
  session_start();
  include('../db_config.php');
  $id = $_POST['id'];
  $topic = $_POST['topic'];
  $name = $_POST['name'];
  $email = $_POST['email'];
  $detail = $_POST['detail'];

  $sql = "UPDATE tb_webboard SET topic = '$topic', name = '$name', email = '$email', detail = '$detail' WHERE id = $id";
  mysqli_query($conn, $sql);
  $_SESSION['update_topic'] = 'success';
  header( "location: http://localhost/shop/admin/edit_topic.php" );
  exit(0);
?>
