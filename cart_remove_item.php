<?php
  session_start();
  $code_item = $_GET['code_item'];
  // array_diff( $_SESSION['array_code_item'], $code_item );
  foreach (array_keys($_SESSION['array_code_item'], $code_item, true) as $key) {
    unset($_SESSION['array_code_item'][$key]);
  }
  header('Location: http://localhost/shop/shopping_cart_detail.php');
?>
