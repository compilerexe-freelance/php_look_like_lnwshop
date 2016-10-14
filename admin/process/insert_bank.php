<?php
  session_start();
  include('../db_config.php');

  $title_bank   = $_POST['title_bank'];
  $name         = $_POST['name'];
  $number_bank  = $_POST['number_bank'];
  $brach_bank   = $_POST['brach_bank'];
  $tel          = $_POST['tel'];

  $sql = "INSERT INTO tb_infobank (title_bank, name, number_bank, brach_bank, tel)
          VALUES('$title_bank', '$name', '$number_bank', '$brach_bank', '$tel')";
  mysqli_query($conn, $sql);
  $_SESSION['insert_bank'] = 'success';
  header( "location: http://localhost/shop/admin/bank_info.php" );
  exit(0);
?>
