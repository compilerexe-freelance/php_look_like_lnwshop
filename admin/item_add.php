<?php
  session_start();
  include('header.php');

  if ($_SESSION['insert_item'] == 'success') {
    echo '
      <script>
        swal("เพิ่มสินค้าเรียบร้อยแล้ว", "", "success")
      </script>
    ';
    $_SESSION['insert_item'] = null;
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
        <i class="glyphicon glyphicon-plus"></i> <a href="item_add.php" style="margin-right: 10px;">เพิ่มสินค้า</a>
        <i class="glyphicon glyphicon-pencil"></i> <a href="item_edit.php" style="margin-right: 10px;">แก้ไขสินค้า</a>
        <i class="glyphicon glyphicon-trash"></i> <a href="item_delete.php" style="margin-right: 10px;">ลบสินค้า</a>
        <hr size="1">
      </div>

      <form action="process/insert_item.php" method="post" enctype="multipart/form-data">
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
              <td><h3><b>เพิ่มสินค้า</b></h3></td>
              <td></td>
            </tr>
            <tr>
              <td>รหัสสินค้า</td>
              <td><input type="text" name="code_item" id="code_item" class="form-control" required></td>
              <td></td>
            </tr>
            <tr>
              <td>ชื่อสินค้า</td>
              <td><input type="text" name="title_item" id="title_item" class="form-control" required></td>
              <td></td>
            </tr>
            <tr>
              <td>รูปสินค้า</td>
              <td><input type="file" name="fileUpload" required></td>
              <td></td>
            </tr>
            <tr>
              <td>ราคา (บาท)</td>
              <td><input type="text" name="price_item" id="price_item" class="form-control" required></td>
              <td></td>
            </tr>
            <tr>
              <td>รายละเอียดสินค้า</td>
              <td><textarea name="detail_item" id="detail_item" class="form-control" style="resize: none;" rows="8" cols="40"></textarea></td>
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
