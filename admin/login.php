<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Shop</title>
    <link rel="stylesheet" href="../template/css/bootstrap.min.css">
    <link rel="stylesheet" href="../template/css/sweetalert.css">
    <script src="../template/js/jquery.min.js"></script>
    <script src="../template/js/sweetalert.min.js"></script>
    <!-- <script src="../template/js/tinymce/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea' });</script> -->
    <style>
      tr th {
        text-align: center;
      }
      tr td {
        text-align: center;
      }
    </style>
  </head>
  <body>
    <div class="container" style="//border: 1px solid red">

<div class="row">

  <div class="col-md-12 text-center">

    <img src="../template/images/banner.gif" alt="" style="height: 250px; width: 100%">

    <form action="process/check_login.php" method="post" class="form-inline" style="padding-top: 100px; padding-bottom: 100px;">

      <div class="form-group">
        <label for="">Username : </label>
        <input type="text" name="username" class="form-control" required>
      </div>
      <br>
      <div class="form-group" style="margin-top: 10px;">
        <label for="">Password : </label>
        <input type="password" name="password" class="form-control" required>
      </div>
      <br>
      <div class="form-group" style="margin-top: 10px; padding-left: 80px;">
        <button type="submit" class="btn btn-success" style="width: 150px;" id="btn_confirm">เข้าสู่ระบบ</button>
      </div>

    </form>

  </div>

</div> <!-- end row -->

<?php include('footer.php'); ?>
