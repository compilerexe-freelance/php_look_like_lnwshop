<?php
  session_start();
  include('../config/db_config.php');
  if ($_SESSION['check_login'] != 'success') {
    header('Location: http://localhost/shop/admin/login.php');
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Shop</title>
    <link rel="stylesheet" href="../template/css/bootstrap.min.css">
    <link rel="stylesheet" href="../template/css/sweetalert.css">
    <script src="../template/js/jquery.min.js"></script>
    <script src="../template/js/sweetalert.min.js"></script>
    <script src="../template/js/tinymce/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea' });</script>
    <style>
      tr th {
        text-align: center;
      }
      tr td {
        text-align: center;
      }
    </style>
  </head>
  <body background="../template/images/background.jpg">
    <div class="container" style="//border: 1px solid red">
