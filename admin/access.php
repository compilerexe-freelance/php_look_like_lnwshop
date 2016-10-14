<?php
  session_start();
  include('header.php');

  if ($_SESSION['insert_admin'] == 'success') {
    echo '
      <script>
        swal("เพิ่มผู้ดูแลระบบเรียบร้อยแล้ว", "", "success")
      </script>
    ';
    $_SESSION['insert_admin'] = null;
  }
?>

<style>
  .table {
    border-bottom:0px !important;
  }
  .table th, .table td {
    border: 1px !important;
  }
</style>

<div class="row">

  <div class="col-md-12">

    <?php include('menu.php'); ?>

    <div class="col-md-9" style="margin-top: 20px; background-color: #ffffe6; border: 1px solid #abc; padding-bottom: 170px;">

      <div class="col-md-12" style="margin-top: 20px;">
        <i class="glyphicon glyphicon-plus"></i> <a href="access.php" style="margin-right: 10px;">เพิ่มผู้ดูแลระบบ</a>
        <i class="glyphicon glyphicon-pencil"></i> <a href="access_edit.php" style="margin-right: 10px;">แก้ไขผู้ดูแลระบบ</a>
        <i class="glyphicon glyphicon-trash"></i> <a href="access_delete.php" style="margin-right: 10px;">ลบผู้ดูแลระบบ</a>
        <hr size="1">
      </div>

      <div class="col-md-12 text-center">
        <h3><b style="padding-left: 60px;">เพิ่มผู้ดูแลระบบ</b></h3>
      </div>

      <div class="col-md-12 text-center">

        <form action="process/insert_admin.php" method="post" class="form-inline">

          <div class="form-group">
            <label for="">Username : </label>
            <input type="text" name="username" class="form-control" required>
          </div>
          <br>
          <div class="form-group" style="margin-top: 10px;">
            <label for="">Password : </label>
            <input type="text" name="password" class="form-control" required>
          </div>
          <br>
          <div class="form-group" style="margin-top: 10px; padding-left: 80px;">
            <button type="submit" class="btn btn-success" style="width: 150px;" id="btn_confirm">เพิ่ม</button>
          </div>

        </form>

      </div>

    </div>
  </div>

</div> <!-- end row -->

<?php include('footer.php'); ?>
