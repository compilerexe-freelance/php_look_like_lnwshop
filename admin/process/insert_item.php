<?php
  session_start();
  date_default_timezone_set("Asia/Bangkok");

  include('../db_config.php');

  $target_dir = "uploads/";
  $name_file = rand(1000000,9999999);
  // $target_file = $target_dir . basename($name_file) . '.jpg';
  $target_file = $target_dir . basename($_FILES["fileUpload"]["name"]);
  $uploadOk = 1;
  $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

  $new_target_file = $target_dir . basename($name_file.'.'.$imageFileType);
  $new_name_file = $name_file.'.'.$imageFileType;
  // Check if image file is a actual image or fake image

  $check = getimagesize($_FILES['fileUpload']["tmp_name"]);
  if($check !== false) {
      echo "File is an image - " . $check["mime"] . ".";
      $uploadOk = 1;
  } else {
      echo "File is not an image.";
      $uploadOk = 0;
  }

  // Check if file already exists
  if (file_exists($target_file)) {
      // echo "Sorry, file already exists.";
      $uploadOk = 0;
  }
  // Check file size
  // if ($_FILES['fileUpload']["size"] > 500000) {
  //     echo "Sorry, your file is too large.";
  //     $uploadOk = 0;
  // }
  // Allow certain file formats
  if($imageFileType != "jpg" && $imageFileType != "png") {
      echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
      $uploadOk = 0;
  }
  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
      echo "Sorry, your file was not uploaded.";
  // if everything is ok, try to upload file
  } else {

      if (move_uploaded_file($_FILES['fileUpload']["tmp_name"], $new_target_file)) {
          // echo "The file ". basename($name_file). " has been uploaded.";
          echo $name_file;
      } else {
          echo "Sorry, there was an error uploading your file.";
      }
  }

  function insert_item($localhost, $db_user, $db_pass, $db_name, $table, $array_value) {

    // Create connection
    $conn = new mysqli($localhost, $db_user, $db_pass, $db_name);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $result = null;
    $count  = 1;
    foreach($array_value as $value) {
      $result = $result . "'" . $value . "'";
      if ($count < count($array_value)) {
        $result = $result . ", ";
        $count++;
      }
    }

    $sql = "INSERT INTO $table (code_item, title_item, detail_item, price_item, picture, created_at)
    VALUES ($result)";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();

  }

  $code_item    = $_POST['code_item'];
  $title_item   = $_POST['title_item'];
  $detail_item  = $_POST['detail_item'];
  $price_item   = $_POST['price_item'];
  // $picture      = $_POST['picture'];
  $created_at   = date('Y-m-d h:i:s');
  $value        = array($code_item, $title_item, $detail_item, $price_item, $new_name_file, $created_at);
  // print_r($value);
  insert_item($localhost, $db_user, $db_pass, $db_name, 'tb_item', $value);

  $_SESSION['insert_item'] = 'success';
  header( "location: http://localhost/shop/admin/item_add.php" );
  exit(0);

?>
