<?php
  session_start();
  date_default_timezone_set("Asia/Bangkok");
  include('../config/db_config.php');

  $topic_id   = mysqli_real_escape_string($conn, $_POST['id']);
  $name       = mysqli_real_escape_string($conn, $_POST['name']);
  $email      = mysqli_real_escape_string($conn, $_POST['email']);
  $detail     = mysqli_real_escape_string($conn, $_POST['detail']);

  if ($name == 'admin') {
    $_SESSION['reply_fail_name'] = 'fail_name';
    header( "location: http://localhost/shop/view_topic.php?id=".$topic_id );
    exit(0);
  }

  $created_at = date('Y-m-d');

  $sql = "INSERT INTO tb_reply (topic_id, name, email, detail, created_at)
          VALUES('$topic_id', '$name', '$email', '$detail', '$created_at')";

  mysqli_query($conn, $sql);
  $_SESSION['insert_reply'] = 'success';
  header( "location: http://localhost/shop/view_topic.php?id=".$topic_id );
  exit(0);
?>
