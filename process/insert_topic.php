<?php
  session_start();
  date_default_timezone_set("Asia/Bangkok");
  include('../config/db_config.php');

  $topic    = $_POST['topic'];
  $name     = $_POST['name'];
  $email    = $_POST['email'];
  $detail   = $_POST['detail'];

  $created_at = date('Y-m-d h:i:s');

  $sql = "INSERT INTO tb_webboard (topic, name, email, detail, created_at)
          VALUES('$topic', '$name', '$email', '$detail', '$created_at')";
  mysqli_query($conn, $sql);
  $_SESSION['insert_topic'] = 'success';
  header( "location: http://localhost/shop/webboard.php" );
  exit(0);
?>
