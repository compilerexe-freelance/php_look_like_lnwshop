<?php
  include('../config/db_config.php');
  // $text_search = $_POST['text_search'];
  //
  // $sql = "SELECT * FROM tb_item WHERE title_item LIKE '%$text_search%' OR title_item LIKE '$text_search%' OR code_item LIKE '%$text_search%'";
  // $result = mysqli_query($conn, $sql);
  //
  // while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {
  //
  //   echo $row['title_item'];
  //
  // }

  //get search term
  $searchTerm  = $_GET['term'];

  //get matched data from skills table
  $sql = "SELECT * FROM tb_item WHERE title_item LIKE '%".$searchTerm."%'";
  $result = mysqli_query($conn, $sql);

  while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {
    $data[] = $row['title_item'];
  }

  //return json data
  echo json_encode($data);


?>
