<?php
  session_start();
  include('../db_config.php');

  $id           = $_POST['id'];
  $title_bank   = $_POST['title_bank'];
  $name         = $_POST['name'];
  $number_bank  = $_POST['number_bank'];
  $brach_bank   = $_POST['brach_bank'];
  $tel          = $_POST['tel'];

  $sql = "UPDATE tb_infobank SET title_bank='$title_bank', name='$name', number_bank='$number_bank', brach_bank='$brach_bank', tel='$tel' WHERE id=$id";
  mysqli_query($conn, $sql);
  $_SESSION['update_bank'] = 'success';
  header( "location: http://localhost/shop/admin/bank_info_edit.php" );
  exit(0);
?>
