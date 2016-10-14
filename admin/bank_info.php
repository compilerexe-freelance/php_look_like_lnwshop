<?php
  session_start();
  include('header.php');

  if ($_SESSION['insert_bank'] == 'success') {
    echo '
      <script>
        swal("เพิ่มบัญชีธนาคารเรียบร้อยแล้ว", "", "success")
      </script>
    ';
    $_SESSION['insert_bank'] = null;
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

    <div class="col-md-9" style="margin-top: 20px; background-color: #ffffe6; border: 1px solid #abc;">

      <div class="col-md-12" style="margin-top: 20px;">
        <i class="glyphicon glyphicon-plus"></i> <a href="bank_info.php" style="margin-right: 10px;">เพิ่มบัญชีธนาคาร</a>
        <i class="glyphicon glyphicon-pencil"></i> <a href="bank_info_edit.php" style="margin-right: 10px;">แก้ไขบัญชีธนาคาร</a>
        <i class="glyphicon glyphicon-trash"></i> <a href="bank_info_delete.php" style="margin-right: 10px;">ลบบัญชีธนาคาร</a>
        <hr size="1">
      </div>

      <form action="process/insert_bank.php" method="post" enctype="multipart/form-data">
        <table class="table">
          <thead>
            <tr>
              <th></th>
              <th></th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td></td>
              <td><h3><b>เพิ่มบัญชีธนาคาร</b></h3></td>
              <td></td>
            </tr>
            <tr>
              <td>ชื่อธนาคาร</td>
              <td><input type="text" name="title_bank" id="title_bank" class="form-control" required></td>
              <td></td>
            </tr>
            <tr>
              <td>ชื่อบัญชี</td>
              <td><input type="text" name="name" id="name" class="form-control" required></td>
              <td></td>
            </tr>
            <tr>
              <td>เลขที่บัญชี</td>
              <td><input type="text" name="number_bank" id="number_bank" class="form-control" required></td>
              <td></td>
            </tr>
            <tr>
              <td>สาขา</td>
              <td><input type="text" name="brach_bank" id="brach_bank" class="form-control" required></td>
              <td></td>
            </tr>
            <tr>
              <td>เบอร์</td>
              <td><input type="text" name="tel" id="tel" class="form-control" required></td>
              <td></td>
            </tr>
            <tr>
              <td></td>
              <td><button type="submit" class="btn btn-success" style="width: 150px;" id="btn_confirm">ยืนยัน</button></td>
              <td></td>
            </tr>
          </tbody>
        </table>

      </form>

    </div>
  </div>

</div> <!-- end row -->

<?php include('footer.php'); ?>
