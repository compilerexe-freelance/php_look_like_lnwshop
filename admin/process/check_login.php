<?php
  session_start();
  include('../db_config.php');

  $username = $_POST['username'];
  $password = $_POST['password'];

  $sql = "SELECT * FROM tb_user WHERE username = '$username' AND password = '$password'";

  $result = mysqli_query($conn, $sql);

  while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {
    if ($username == $row['username'] && $password == $row['password']) {
      $state = 1;
    }
  }
  
  if ($state == 1) {
    $_SESSION['check_login'] = 'success';
    header('Location: http://localhost/shop/admin/main.php');
  } else {
    header('Location: http://localhost/shop/admin/main.php');
    exit(0);
  }

?>
