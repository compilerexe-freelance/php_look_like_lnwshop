<?php
  include('../config/db_config.php');

  $text_search = $_POST['text_search'];

  $sql = "SELECT * FROM tb_item WHERE title_item = '$text_search'";
  $result = mysqli_query($conn, $sql);

  while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {
    $code_item = $row['code_item'];
    header('Location: http://localhost/shop/item_detail.php?code_item='. $code_item);
    exit(0);
  }

?>
